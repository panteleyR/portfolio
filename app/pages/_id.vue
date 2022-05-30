<template>
  <section>
    <h1 v-if="article" class="header">
      {{article.title}}
    </h1>
    <div @click="$router.push('/')" class="button back">Back</div>
    <div class="wrapper">
      <div v-if="article">
        <div class="card">
          <div class="article">
            <div class="description">{{article.description}}</div>
            <div class="text">{{article.text}}</div>
          </div>
        </div>
      </div>
    </div>

    <div class="actions">
      <div @click="modalDeleteOpen = true" class="action action-minus"></div>
      <div @click="modalEditOpen = true" class="button">Редактирование</div>
    </div>

    <modal-form v-if="article" v-model="modalEditOpen">
      <div class="modal-title">Редактирование</div>
      <label class="input-block" for="title">Заголовок статьи: <input v-model="article.title" type="text" name="title"></label>
      <label class="input-block" for="description">Описание: <textarea v-model="article.description" type="text" name="description"></textarea></label>
      <label class="input-block" for="text">Текст: <textarea v-model="article.text" type="text" name="text"></textarea></label>
      <div class="input-block">
        <div @click="editArticle" class="button" :class="{disabledBtn: !validateEditArticle}">Сохранить</div>
      </div>
    </modal-form>

    <modal-form v-model="modalDeleteOpen">
      <div class="modal-title">Удаление</div>
      <div class="input-block">Вы уверены, что хотите удалить статью?</div>
      <div class="delete-block">
        <div @click="deleteArticle" class="button">Да</div>
        <div @click="modalDeleteOpen = false" class="button">Нет</div>
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
      article: null,
      modalEditOpen: false,
      modalDeleteOpen: false,
    }
  },

  computed: {
    validateEditArticle() {
      return this.article.text && this.article.description && this.article.title
    }
  },

  methods: {
    show() {
      this.$store.dispatch('article/show', this.$route.params.id).then((res) => {
        this.article = res.data
      })
    },

    editArticle() {
      if (this.validateEditArticle === false) {
        return
      }

      this.$store.dispatch('article/update', {
        id: this.article.id,
        title: this.article.title,
        description: this.article.description,
        text: this.article.text
      }).then(() => {
        this.show()
        this.modalEditOpen = false
      })
    },

    deleteArticle() {
      this.$store.dispatch('article/delete', this.$route.params.id).then(() => {
        this.modalDeleteOpen = false
        this.$router.push('/')
      })
    }
  },

  async fetch () {
    await this.$store.dispatch('article/show', this.$route.params.id).then((res) => {
      this.article = res.data
    })
  }
}
</script>

<style scoped>
.delete-block .button {
  margin-left: 20px;
}
.delete-block {
  display: flex;
  justify-content: end;
}
.article {
  width: 100%;
  display: flex;
  justify-content: flex-start;
  flex-wrap: wrap;
  text-align: left;
}
.article .description {
  width: 100%;
  font-size: 18px;
  margin-bottom: 20px;
}
.article .text {
  width: 100%;
  font-size: 18px;
  margin-bottom: 20px;
}
.back {
  position: absolute;
  top: 40px;
  left: -100px;
}

.actions .button {
  margin-left: 40px;
  border-radius: 10px;
}
</style>

