<template>
    <div>
        <StepInfo step="2">
            Выберите <span>комнаты</span>
        </StepInfo>
        <Loader v-show="loading" />
        <section class="chooseroom" v-show="!loading">
            <div class="container-fluid">
                <div class="chooseroom__inner row justify-content-between">
                    <BackButton prevPath="/" />
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-4 chooseroom__block"
                                 v-for="roomType in allRoomTypes">
                                <div :class="`circle mx-2 my-2 ${customRoomTypes
                                        .some((c) => c.id === roomType.id)
                                            ? 'circle-selected' : ''}`">
                                    <div class="circle-content clickable"
                                        @click="switchCustomRoomType(roomType)"
                                    >
                                        <i :class="`fas fa-${roomType.icon}`"></i>
                                        <p>{{ roomType.name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <NextButton nextPath="/rooms" :disabled="!allowNext"/>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
  import { mapActions, mapMutations, mapState } from 'vuex';
  export default {
    name: "CustomRoomTypes",
    components: {
      StepInfo: () => import('../components/StepInfo'),
      BackButton: () => import('../components/BackButton'),
      NextButton: () => import('../components/NextButton'),
      Loader: () => import('../components/Loader'),
    },
    methods: {
      ...mapActions(['getAllRoomTypes']),
      ...mapMutations('order', ['switchCustomRoomType'])
    },
    computed: {
      ...mapState(['allRoomTypes', 'loading']),
      ...mapState('order', ['customRoomTypes']),
      allowNext () {
        return this.customRoomTypes.length >= 2;
      }
    },
    created () {
      this.getAllRoomTypes();
    }
  }
</script>

<style scoped>

</style>