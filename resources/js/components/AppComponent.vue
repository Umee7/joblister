<template>
    <div class="app-wrapper">
        <SearchBar v-on:searchByTitle="searchByTitle" />
        <div class="app-content">
            <router-view></router-view>
        </div>
        <vue-progress-bar></vue-progress-bar>
    </div>
</template>

<script>
import SearchBar from "./SearchBar";
export default {
    name: "app-component",
    components: {
        SearchBar
    },
    methods: {
        searchByTitle(title) {
            this.$router.push({ name: "home", query: { q: title } });
        }
    }
};
</script>

<style>
.app-wrapper {
    min-height: calc(100vh - 200px);
    background-color: var(--bg-primary);
}

.app-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

.card-list-component {
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 1.5rem;
    margin-bottom: 1rem;
    color: var(--text-secondary);
    cursor: pointer;
    transition: all 0.3s ease;
}

.card-list-component:hover {
    transform: translateY(-2px);
    border-color: var(--accent-primary);
    background-color: var(--bg-tertiary);
}

.hover-shadow:hover {
    box-shadow: var(--shadow-md);
}

@media (max-width: 768px) {
    .app-content {
        padding: 1rem;
    }
}
</style>
