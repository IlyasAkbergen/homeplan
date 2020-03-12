<template>
    <div class="text-center mt-5 pt-5">
        <h4 class="font-weight-normal mb-2">{{ text }}</h4>
        <div class="d-flex justify-content-center mt-3">
            <div class="spinner-border" role="status">
                <span class="sr-only">Загрузка...</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Loader",
        props: {
            text: {
                type: String,
                default: 'Загрузка'
            }
        }
    }
</script>

<style scoped>
    .loader {
        border: 16px solid #f3f3f3; /* Light grey */
        border-top: 16px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
