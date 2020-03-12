<template>
    <div>
        <transition name="fade" mode="out-in">
            <StepInfo step="3">
                Выберите стиль для комнаты: <span>{{ selectedRoomType ? selectedRoomType.name : '' }}</span>
            </StepInfo>
        </transition>
        <section class="rooms">
            <div class="container-fluid">
                <div class="rooms__inner row align-items-center justify-content-between">
                    <BackButton :onClick="backClicked" />
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
                    <NextButton :onClick="nextClicked" :disabled="!allowNext" />
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
                return this.isLastRoomType
                  ? this.selectedRoomTypes
                    && this.selectedRoomTypes.length === Object.keys(this.selectedRooms).length
                  : this.allowNextRoomTypeSelection;
            },
            allowNextRoomTypeSelection () {
                return this.selectedRoomTypeIndex < this.selectedRoomTypes.length
                    && this.currentRoomTypeStyleSelected;
            },
            currentRoomTypeStyleSelected () {
                return this.currentSelectedRoomId !== null;
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
                return this.selectedRooms[this.selectedRoomType.pivot_id] ?? null
            },
            prevPath () {
                return this.selectedComplexId === 'none'
                  ? '/custom-room-types' : '/layouts';
            },
            nextPath () {
                return '/result';
            },
            isLastRoomType () {
                return this.selectedRoomTypeIndex === this.selectedRoomTypes.length - 1
            },
            isFirstRoomType () {
                return this.selectedRoomTypeIndex === 0;
            }
        },
        methods: {
            setSelectedRoomTypeIndex (value) {
                this.selectedRoomTypeIndex = value
            },
            ...mapMutations('order', ['setSelectedRoom']),
            backClicked () {
              if (!this.isFirstRoomType) {
                return this.selectedRoomTypeIndex = this.selectedRoomTypeIndex - 1;
              } else {
                return this.$router.push(this.prevPath);
              }
            },
            nextClicked () {
              if ( !this.isLastRoomType ) {
                return this.selectedRoomTypeIndex = this.selectedRoomTypeIndex + 1;
              } else {
                return this.$router.push(this.nextPath);
              }
            }
        },
    }
</script>

<style scoped>

</style>
