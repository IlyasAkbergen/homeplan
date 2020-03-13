<template>
    <section class="checkout">
        <div class="container-fluid">
            <div class="checkout__inner">
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <div class="checkout__box">
                            <div class="checkout--img">
                                <img src="../../assets/img/check.png" >
                            </div>
                            <h1>Ваша заявка принята</h1>
                        </div>
                        <p>сейчас Вы будете перенаправлены <br>
                            <router-link to="/">на главную страницу</router-link>
                            через {{ countDown }} секунд ...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
  export default {
    name: "SuccessOrder",
    data(){
      return {
        countDown : 5,
      }
    },
    methods: {
      countDownTimer() {
        if(this.countDown > 0) {
          setTimeout(() => {
            this.countDown -= 1;
            if (this.countDown > 0){
              this.countDownTimer()
            } else {
              this.$router.push('/');
            }
          }, 1000)
        }
      }
    },
    created() {
      this.countDownTimer()
    }
  }
</script>

<style scoped>

</style>
