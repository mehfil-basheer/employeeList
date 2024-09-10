<template>
    <div class="container-box">
      <div class="search-container">
        <span class="search-label">Search</span>
        <input v-model="search" @input="fetchEmployees" placeholder="Search name/designation/department" />
      </div>
      <div class="employee-list">
        <div v-for="employee in employees" :key="employee.id" class="employee-card">
          <h3>{{ employee.name }}</h3>
          <p>{{ employee.designation.name }}</p>
          <p>{{ employee.department.name }}</p>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        search: '',
        employees: [],
      };
    },
    methods: {
      fetchEmployees() {
        axios.get(`/api/employees?search=${this.search}`)
          .then(response => {
            this.employees = response.data;
          })
          .catch(error => {
            console.error(error);
          });
      },
    },
    mounted() {
      console.log("Component mounted!");
      this.fetchEmployees();
    },
  };
  </script>
  
  <style>
  .container-box {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    background-color: #f9f9f9;
    max-width: 800px;
    margin: 20px auto 0;
  }
  
  .search-container {
    margin-bottom: 20px;
  }
  
  .search-label {
    font-weight: bold;
  }
  
  input {
    padding: 10px;
    font-size: 16px;
    width: 100%;
    box-sizing: border-box;
  }
  
  .employee-list {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
  }
  
  .employee-card {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }
  </style>
  