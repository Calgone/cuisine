<template>
  <div>
    <div class="tabs">
      <ul>
        <li v-for="tab in tabs" :key="tab.name" :class="{ 'is-active': tab.isActive }">
          <a :href="tab.href" @click="selectTab(tab)">{{tab.name}}</a>
        </li>
      </ul>
    </div>
    <div class="tab-details">
      <slot></slot>
    </div>
  </div>
</template>
<script>
export default {
  name: "main-tabs",
  data() {
    return { tabs: [] };
  },
  created() {
    this.tabs = this.$children;
  },
  computed: {
      href() {
          return '#' + this.name.toLowerCase().replace(/ /g, '-');
      }
  },
  methods: {
      selectTab(selectedTab) {
          this.tabs.forEach(tab => {
              tab.isActive = (tab.name == selectedTab.name)
          });
      }
  },
  mounted() {
    console.log(this.$children);
  }
};
</script>
