<template>
    <div>
        <Header />
        <StepInfo step="3">
            Какой <span>{{ selectedRoomType ? selectedRoomType.name : '' }}</span> вам нужен?
        </StepInfo>
        <section class="rooms">
            <div class="container-fluid">
                <div class="rooms__inner row align-items-center justify-content-between">
                    <BackButton prevPath="/layouts" />
                    <div class="col-md-8">
                        <div class="row justify-content-around">
                            <div class="col-xl" v-for="(roomType, index) in selectedLayout.roomTypes">
                                <a
                                    href="#"
                                    :class="`room--button ${selectedRoomType.id === roomType.id ? 'active' : ''}`"
                                    @click="setSelectedRoomTypeIndex(index)"
                                >
                                    {{ roomType.name }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <NextButton
                        nextPath="/result"
                        :disabled="!allowNext"
                    />
                </div>
                <div class="rooms__message">
                    <h1>Выберите понравившийся интерьер</h1>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-sm-12">
                        <div
                            :class="`card rooms--card ${ selectedRooms.includes(room.id) ? 'active' : '' }`"
                            v-for="room in rooms"
                            @click="pushSelectedRoom(room.id)"
                            :key="room.id"
                        >
                            <div class="rooms__card-image">
                                <img :src="room.images[0].path" class="card-img-top">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import {mapState, mapGetters, mapMutations} from 'vuex';
    export default {
        name: "Rooms",
        components: {
            StepInfo: () => import('../components/StepInfo'),
            BackButton: () => import('../components/BackButton'),
            NextButton: () => import('../components/NextButton'),
            Header: () => import('../components/Header')
        },
        data(){
            return {
                selectedRoomTypeIndex: 0,
            }
        },
        computed: {
            ...mapState('order', ['selectedRooms']),
            ...mapGetters(['selectedLayout']),
            allowNext () {
                return this.selectedLayout.roomTypes
                    && this.selectedLayout.roomTypes.length === this.selectedRooms.length
            },
            selectedRoomType () {
                return this.selectedLayout && this.selectedLayout.roomTypes
                    ? this.selectedLayout.roomTypes[this.selectedRoomTypeIndex]
                    : null;
            },
            rooms () {
                return this.selectedRoomType ? this.selectedRoomType.rooms : []
            },
        },
        methods: {
            setSelectedRoomTypeIndex (value) {
                this.selectedRoomTypeIndex = value
            },
            ...mapMutations('order', ['pushSelectedRoom']),
        },
    }
</script>

<style scoped>

</style>
