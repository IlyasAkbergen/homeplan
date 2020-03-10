<template>
    <div>
        <StepInfo step="3">
            Выберите стиль для комнаты: <span>{{ selectedRoomType ? selectedRoomType.name : '' }}</span>
        </StepInfo>
        <section class="rooms">
            <div class="container-fluid">
                <div class="rooms__inner row align-items-center justify-content-between">
                    <BackButton :prevPath="`${selectedComplexId === 'none' ? '/custom-room-types' : '/layouts'}`" />
                    <div class="col-md-8">
                        <div class="row justify-content-around">
                            <div class="col-xl" v-for="(roomType, index) in selectedRoomTypes">
                                <a
                                    href="#"
                                    :class="`room--button ${
                                      selectedRoomType.pivot_id === roomType.pivot_id
                                        ? 'active' : ''}`"
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
                    <div class="col-xl-4 col-md-6 col-sm-12"
                         v-for="room in rooms"
                         @click="setSelectedRoom({ value: room.id, roomTypePivotId: selectedRoomType.pivot_id })"
                         :key="room.id"
                    >
                        <div
                            :class="`card rooms--card ${ currentSelectedRoomId === room.id ? 'active' : '' }`"
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
        },
        data(){
            return {
                selectedRoomTypeIndex: 0,
            }
        },
        computed: {
            ...mapState('order', ['selectedRooms', 'selectedComplexId']),
            ...mapGetters(['selectedRoomTypes']),
            allowNext () {
                return this.selectedRoomTypes
                    && this.selectedRoomTypes.length === Object.keys(this.selectedRooms).length
            },
            selectedRoomType () {
                return this.selectedRoomTypes
                    ? this.selectedRoomTypes[this.selectedRoomTypeIndex]
                    : null;
            },
            rooms () {
                return this.selectedRoomType ? this.selectedRoomType.rooms : []
            },
            currentSelectedRoomId () {
                return this.selectedRooms[this.selectedRoomType.pivot_id] ?? {}
            },
        },
        methods: {
            setSelectedRoomTypeIndex (value) {
                this.selectedRoomTypeIndex = value
            },
            ...mapMutations('order', ['setSelectedRoom']),
        },
    }
</script>

<style scoped>

</style>
