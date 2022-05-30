<template>
  <div class="container">
      <nuxt/>
  </div>
</template>

<style>
html {
  font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
  font-size: 16px;
  word-spacing: 1px;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
}

.header {
  display: flex;
  align-items: center;
  font-weight: 300;
  font-size: 100px;
  color: #35495e;
  letter-spacing: 1px;
}

.button {
  border-radius: 20%;
  padding: 10px;
  background: #0069d9;
  color: white;
  cursor: pointer;
}

.disabledBtn {
  cursor: not-allowed;
  background: #4e555b;
}

.input-block {
  display: flex;
  width: 100%;
  margin: 20px 0;
  justify-content: end;
}
.input-block input {
  margin-left: 20px;
}

.input-block textarea {
  margin-left: 20px;
}
.actions {
  /*position: absolute;*/
  /*bottom: 40px;*/
  /*left: 0;*/
  width: 100%;
  padding: 20px 0;
  display: flex;
}

.modal-title {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
  display: flex;
  margin: 20px 0;
}

.title {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
  display: flex;
  margin: 20px 0;
}

.action {
  border-radius: 50%;
  border: rgba(11, 46, 19, 0.99);
  width: 50px;
  height: 50px;
  position: relative;
  cursor: pointer;
}

.action-plus {
  background: #1e7e34;
  color: white;
}
.action-plus::before {
  content: '';
  background: white;
  z-index: 10;
  position: absolute;
  top: 50%;
  left: 50%;
  width: 60%;
  height: 10%;
  transform: translate(-50%, -50%);
}
.action-plus:after {
  content: '';
  background: white;
  z-index: 10;
  position: absolute;
  width: 60%;
  height: 10%;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) rotate(90deg);
}
.action-minus {
  background: #721c24;
  color: white;
}
.action-minus:before {
  content: '';
  background: white;
  z-index: 10;
  position: absolute;
  width: 60%;
  height: 10%;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.card > * {
  margin: 10px 0;
}
.card {
  font-family: "Quicksand", "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; /* 1 */
  margin: 30px 0;
  padding: 20px 10px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
}

.container {
  position: relative;
  /*padding: 100px 0;*/
  height: 100vh;
  width: 80%;
  margin: 0 auto;
  max-width: 1400px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.wrapper {
  height: 70%;
  width: 100%;
  padding: 10px 20px;
  /*display: flex;*/
  /*justify-content: center;*/
  /*align-items: center;*/
  /*text-align: center;*/
  overflow-y: scroll;

}
input, textarea {
  padding: 10px 5px;
  font-size: 100%;
}

section {
  /*padding: 100px 0;*/
  width: 100%;
  height: 100%;
}

*, *:before, *:after {
  box-sizing: border-box;
  margin: 0;
}

.button--green {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #3b8070;
  color: #3b8070;
  text-decoration: none;
  padding: 10px 30px;
}

.button--green:hover {
  color: #fff;
  background-color: #3b8070;
}

.button--grey {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #35495e;
  color: #35495e;
  text-decoration: none;
  padding: 10px 30px;
  margin-left: 15px;
}

.button--grey:hover {
  color: #fff;
  background-color: #35495e;
}
</style>

