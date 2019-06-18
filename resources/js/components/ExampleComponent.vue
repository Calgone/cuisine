<template>
  <div class="container">
    <div class="column">
      <div class="card">
        <div class="card-header" v-text="name">My updated component</div>
        <input type="text" id="input" v-model="message">
        <br>
        The value of the input is {{ message }}
        <div class="card-body">I'm an example component.</div>
      </div>
      <!-- <ul>
                    <li v-for="name in names" :key="name">{{ name }}</li>
      </ul>-->
      <input type="text" v-model="newName">
      <button :disabled="isDisabled" :title="buttonTitle" @click="addName">Add name</button>
      <br>
      {{ reversedMessage }}
      <br>
      <h3>Tâches</h3>
      <ul>
        <li v-for="task in tasks" :key="task.description" v-text="task.description"></li>
      </ul>
      <h3>Tâches incomplètes</h3>
      <ul>
        <li v-for="task in incompleteTasks" :key="task.description" v-text="task.description"></li>
      </ul>
      <ul>
        <RecipeList></RecipeList>
      </ul>
    </div>
    <a class="button is-success" @click="testAjax">test Ajax</a>
    <br>
    <main-tabs>
      <tab-detail name="about us" :selected="true">
        <h1>He is the content for the about us tab</h1>
      </tab-detail>
      <tab-detail name="about our culture" :selected="false">
        <h1>He is the content for the about our culture tab</h1>
      </tab-detail>
      <tab-detail name="about our vision" :selected="false">
        <h1>He is the content for the about our vision tab</h1>
      </tab-detail>
    </main-tabs>
    <ul>
        <li v-for="skill in skills" :key="skill">{{ skill }}</li>
    </ul>
  </div>
</template>

<script>
import RecipeList from "./RecipeList";
import MainTabs from "./MainTabs";
import TabDetail from "./TabDetail";
import axios from 'axios';

export default {
  components: {
    RecipeList,
    MainTabs,
    TabDetail
  },
  data() {
    return {
      name: "Laracasts",
      message: "Mon message",
      newName: "",
      names: ["Joe", "Mary", "Jane", "Jack"],
      buttonTitle: "New title",
      dis: false,
      tasks: [
        { description: "Go to the store", completed: true },
        { description: "Finish screencast", completed: false },
        { description: "Make donation", completed: false },
        { description: "Clear inbox", completed: false },
        { description: "Make dinner", completed: false },
        { description: "Clean room", completed: true }
      ],
      skills: []
    };
  },
  computed: {
    isDisabled() {
      return this.dis;
    },
    reversedMessage() {
      return this.message
        .split("")
        .reverse()
        .join("");
    },
    incompleteTasks() {
      return this.tasks.filter(task => !task.completed);
    }
  },
  methods: {
    addName() {
      this.names.push(this.newName);
      this.newName = "";
      this.dis = true;
    },
    testAjax() {
        axios.get('/api/skills').then(response => this.skills = response.data);
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
