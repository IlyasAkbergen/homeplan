<template>
    <div>
        <StepInfo step="2">
            Выберите <span>комнаты</span>
        </StepInfo>
        <section class="layout">
            <div class="container-fluid">
                <div class="layout__inner row justify-content-between">
                    <BackButton prevPath="/custom-apartment" />
                    <div class="col-md-8 mt-5">
                        <div class="row">
                            <div class="col-md-3 mb-4"v-for="roomType in allRoomTypes">
                                <div :class="`circle mx-auto ${customRoomTypes
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
    },
    methods: {
      ...mapActions(['getAllRoomTypes']),
      ...mapMutations('order', ['switchCustomRoomType'])
    },
    computed: {
      ...mapState(['allRoomTypes']),
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