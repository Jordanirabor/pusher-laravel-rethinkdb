

<template>
  <div class="container">
    <div class="flex-center position-ref full-height">
      <div class="content">
        <div class="title m-b-md">
          <div class="container my-5">
            <h2>Real-time Todo!</h2>
            <form action="/todo" method="POST">
              <slot></slot>
              <div class="form-group">
                <label>Create Todo Item</label>
                <input name="body" type="text" class="form-control" placeholder="Learn Angular.." />
              </div>
              <button type="submit" class="btn btn-primary btn-block">Add Item</button>
            </form>
            <div class="my-5">
              <h3>To-do list:</h3>
              <div v-for="todo in todos" v-bind:key="todo.id" class="input-group mb-3">
                <form v-bind:id="'update'+todo.id" v-bind:action="'/todo/'+todo.id" method="POST">
                  <slot></slot>
                  <input type="hidden" name="_method" value="PUT" />
                  <input
                    type="text"
                    name="body"
                    v-model="todo.body"
                    class="form-control d-inline-block w-50"
                  />
                  <button
                    v-bind:form="'update'+todo.id"
                    class="btn btn-primary"
                    type="submit"
                  >Update</button>
                </form>
                <form v-bind:id="'delete'+todo.id" v-bind:action="'/todo/'+todo.id" method="POST">
                  <slot></slot>
                  <input type="hidden" name="_method" value="DELETE" />
                  <button v-bind:form="'delete'+todo.id" class="btn btn-danger" type="submit">Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
window.Pusher = require("pusher-js");
import Echo from "laravel-echo";

export default {
  props: ["currentTodos"],
  data() {
    return {
      todos: []
    };
  },
  mounted() {
    this.todos = this.currentTodos;
    this.listenForChanges();
  },
  methods: {
    listenForChanges() {
      window.Echo = new Echo({
        broadcaster: "pusher",
        key: "PUSHER_APP_KEY",
        cluster: "eu",
        forceTLS: true
      });
      const channel = window.Echo.channel("todo-channel");
      channel.listen(".todo-event", data => {
        this.todos = data.todos;
      });
    }
  }
};
</script>