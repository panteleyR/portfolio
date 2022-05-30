<template>
  <div v-if="value" class="modal">
    <div class="wrapper">
      <div @click="offShow()" class="background"></div>
      <div class="content card">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ModalForm",
  props: {
    value: {
      type: Boolean,
      default: false
    }
  },

  methods: {
    offShow() {
      this.$emit("input", false)
    }
  }
}
</script>

<style scoped>
.modal {
  position: fixed;
  z-index: 10000;
  width: 100%;
  height: 100%;
  background: rgba(27, 30, 33, 0.05);
  top: 0;
  left: 0;
}

.wrapper {
  width: 100%;
  height: 100%;
  background: rgba(27, 30, 33, 0.05);
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
}

.background {
  position: absolute;
  /*z-index: 10001;*/
  width: 100%;
  height: 100%;
  background: rgb(27 30 33 / 6%);
  top: 0;
  left: 0;
}

.content {
  z-index: 10001;
  width: 80%;
  height: 80%;
  min-width: 300px;
  max-width: 600px;
  padding: 40px 60px;
  background: white;
  display: flex;
  flex-direction: column;
  justify-content: left;
}
</style>
