<template>
  <section>
    <h1 class="header">
      Articles
    </h1>
    <div class="wrapper">
      <div class="articles">
        <div v-for="(article, i) in listArticles" :key="i" class="article card">
          <div class="title">{{article.title}}</div>
          <div class="description">{{article.description}}</div>
          <div @click="$router.push({name: 'id', params: {id: article.id}})" class="button">Читать далее</div>
        </div>
      </div>
    </div>

    <div class="actions">
      <div @click="modalOpen = true" class="action action-plus"></div>
    </div>

    <modal-form v-model="modalOpen">
      <div class="modal-title">Create</div>
      <label class="input-block" for="title">Заголовок статьи: <input v-model="createTitle" type="text" name="title"></label>
      <label class="input-block" for="description">Описание: <textarea v-model="createDescription" type="text" name="description"></textarea></label>
      <label class="input-block" for="text">Текст: <textarea v-model="createText" type="text" name="text"></textarea></label>
      <div class="input-block">
        <div @click="addArticle" class="button" :class="{disabledBtn: !validateCreateArticle}">Добавить</div>
      </div>
    </modal-form>
  </section>
</template>

<script>
import ModalForm from "~/components/ModalForm";

export default {
  components: {ModalForm},
  data () {
    return {
      modalOpen: false,
      createTitle: null,
      createDescription: null,
      createText: null,
    }
  },

  computed: {
    listArticles () {
      return this.$store.getters['article/list']
    },

    validateCreateArticle() {
      return this.createText && this.createDescription && this.createTitle
    }
  },

  methods: {
    addArticle() {
      if (this.validateCreateArticle === false) {
        return
      }

      this.$store.dispatch('article/create', {
        title: this.createTitle,
        description: this.createDescription,
        text: this.createText,
      }).then(() => {
        this.getAll()
        this.modalOpen = false
      })
      this.createTitle = null
      this.createDescription = null
      this.createText = null
    },

    getAll() {
      this.$store.dispatch('article/getAll')
    }
  },

  async fetch() {
    await this.$store.dispatch('article/getAll')
  }
}
</script>

<style scoped>


.action {
  margin-right: 20px;
}
</style>

