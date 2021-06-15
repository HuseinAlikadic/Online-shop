<template>
    <div class="footer">
        <p>Footer</p>
    </div>
</template>
<style scoped>
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #ffff;
    color: black;
    text-align: center;
    min-height: 4rem;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset,
        rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
}
</style>
<script>
export default {
    name: "Footer"
};
</script>
