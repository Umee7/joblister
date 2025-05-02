<template>
    <div class="sidebar">
        <div class="filter-card">
            <div class="filter-header">
                <i class="fas fa-filter"></i>
                <strong>Refine Your Search</strong>
            </div>
            <div class="filter-body">
                <div class="filter-section">
                    <h6 class="filter-title">Job Categories</h6>
                    <div class="filter-content">
                        <select
                            name="job_category"
                            class="filter-select"
                            @change="filterCategory($event)"
                        >
                            <option disabled selected value
                                >Select Category</option
                            >
                            <option
                                v-for="category in categories"
                                :value="category.id"
                                :key="category.id"
                            >
                                {{ category.category_name }}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="filter-section">
                    <h6 class="filter-title">Job Level</h6>
                    <div class="filter-content">
                        <select
                            name="job_level"
                            class="filter-select"
                            @change="filterJobLevel($event)"
                        >
                            <option disabled selected value
                                >Select Level</option
                            >
                            <option value="Senior level">Senior Level</option>
                            <option value="Mid level">Mid Level</option>
                            <option value="Top level">Top Level</option>
                            <option value="Entry level">Entry Level</option>
                        </select>
                    </div>
                </div>

                <div class="filter-section">
                    <h6 class="filter-title">Education</h6>
                    <div class="filter-content">
                        <select
                            name="education"
                            class="filter-select"
                            @change="filterEducation($event)"
                        >
                            <option disabled selected value
                                >Select Education</option
                            >
                            <option value="Bachelors">Bachelors</option>
                            <option value="High School">High School</option>
                            <option value="Master">Master</option>
                            <option value="SEE Mid School"
                                >SEE Mid School</option
                            >
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="filter-section">
                    <h6 class="filter-title">Employment Type</h6>
                    <div class="filter-content">
                        <select
                            name="employment_type"
                            class="filter-select"
                            @change="filterEmploymentType($event)"
                        >
                            <option disabled selected value>Select Type</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Freelance">Freelance</option>
                            <option value="Internship">Internship</option>
                            <option value="Trainneship">Traineeship</option>
                            <option value="Volunter">Volunteer</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "sidebar-component",
    data() {
        return {
            categories: []
        };
    },
    mounted() {
        this.setCategoies();
    },
    methods: {
        setCategoies() {
            axios
                .get("/api/company-categories")
                .then(res => res.data)
                .then(data => {
                    this.categories = JSON.parse(JSON.stringify(data));
                });
        },
        filterCategory(e) {
            this.$emit("get-by-category", e.target.value);
        },
        filterEmploymentType(e) {
            this.$emit("get-by-employmentType", e.target.value);
        },
        filterEducation(e) {
            this.$emit("get-by-education", e.target.value);
        },
        filterJobLevel(e) {
            this.$emit("get-by-job-level", e.target.value);
        }
    }
};
</script>

<style scoped>
.sidebar {
    width: 100%;
    padding: 1rem;
}

.filter-card {
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    overflow: hidden;
}

.filter-header {
    padding: 1rem;
    background-color: var(--bg-tertiary);
    color: var(--text-primary);
    display: flex;
    align-items: center;
    gap: 0.75rem;
    border-bottom: 1px solid var(--border-color);
}

.filter-body {
    padding: 1rem;
}

.filter-section {
    margin-bottom: 1.5rem;
}

.filter-section:last-child {
    margin-bottom: 0;
}

.filter-title {
    color: var(--text-primary);
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 0.75rem;
}

.filter-select {
    width: 100%;
    padding: 0.75rem;
    background-color: var(--bg-tertiary);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    color: var(--text-primary);
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.filter-select:focus {
    outline: none;
    border-color: var(--accent-primary);
    box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.1);
}

.filter-select option {
    background-color: var(--bg-secondary);
    color: var(--text-primary);
    padding: 0.5rem;
}

@media (max-width: 768px) {
    .sidebar {
        padding: 0;
        margin-bottom: 1rem;
    }
}
</style>
