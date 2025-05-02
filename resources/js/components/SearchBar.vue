<template>
    <section class="search-section">
        <div class="search-container">
            <div class="search-wrapper">
                <form @submit.prevent="searchByTitle">
                    <div class="search-input-group">
                        <input
                            type="text"
                            name="q"
                            class="search-input"
                            placeholder="Search jobs by title, company, or keywords"
                            v-model="jobTitle"
                        />
                        <button type="submit" class="search-button">
                            <i class="fas fa-search"></i>
                            <span>Search Jobs</span>
                        </button>
                    </div>
                </form>

                <div class="search-links">
                    <router-link to="/" class="search-link">
                        <i class="fas fa-briefcase"></i>
                        <span>All Jobs</span>
                    </router-link>
                    <router-link to="/jobs-by-organization" class="search-link">
                        <i class="fas fa-building"></i>
                        <span>By Organisation</span>
                    </router-link>
                    <router-link to="/jobs-by-category" class="search-link">
                        <i class="fas fa-th-large"></i>
                        <span>By Category</span>
                    </router-link>
                    <router-link to="/jobs-by-title" class="search-link">
                        <i class="fas fa-tag"></i>
                        <span>By Title</span>
                    </router-link>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "search-bar",
    data() {
        return {
            jobTitle: null
        };
    },
    mounted() {
        const q = this.getParameterByName("q", window.location.href);
        if (q !== "") {
            this.jobTitle = q;
        }
    },
    methods: {
        searchByTitle() {
            if (this.jobTitle && this.jobTitle.trim() !== "") {
                this.$emit("searchByTitle", this.jobTitle);
            }
        },
        getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return "";
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }
    }
};
</script>

<style scoped>
.search-section {
    width: 100%;
    padding: 1.5rem 1rem;
    background-color: var(--bg-secondary);
    border-bottom: 1px solid var(--border-color);
}

.search-container {
    max-width: 800px;
    margin: 0 auto;
}

.search-wrapper {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.search-input-group {
    position: relative;
    width: 100%;
}

.search-input {
    width: 100%;
    padding: 1rem 1rem 1rem 1.5rem;
    font-size: 1rem;
    color: var(--text-primary);
    background-color: var(--bg-tertiary);
    border: 2px solid var(--border-color);
    border-radius: 12px;
    transition: all 0.3s ease;
}

.search-input:focus {
    outline: none;
    border-color: var(--accent-primary);
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
}

.search-input::placeholder {
    color: var(--text-muted);
}

.search-button {
    position: absolute;
    right: 0.5rem;
    top: 50%;
    transform: translateY(-50%);
    padding: 0.75rem 1.5rem;
    background: linear-gradient(
        135deg,
        var(--accent-primary),
        var(--accent-secondary)
    );
    color: var(--text-primary);
    border: none;
    border-radius: 8px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.search-button:hover {
    transform: translateY(-50%) translateX(-2px);
    box-shadow: var(--shadow-md);
}

.search-links {
    display: flex;
    justify-content: center;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.search-link {
    color: var(--text-secondary);
    text-decoration: none;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.search-link:hover {
    color: var(--text-primary);
    background-color: var(--bg-tertiary);
    text-decoration: none;
}

.search-link.router-link-active {
    color: var(--accent-primary);
    background-color: rgba(59, 130, 246, 0.1);
}

@media (max-width: 768px) {
    .search-section {
        padding: 1rem;
    }

    .search-button {
        position: relative;
        right: auto;
        top: auto;
        transform: none;
        width: 100%;
        margin-top: 1rem;
        justify-content: center;
    }

    .search-links {
        flex-direction: column;
        gap: 0.5rem;
    }

    .search-link {
        justify-content: center;
    }
}
</style>
