<template>
    <div>
      <input v-model="search" @input="fetchEmployees" placeholder="Search name/designation/department"/>
      <div v-for="employee in employees" :key="employee.id" class="employee-card">
        <h3>{{ employee.name }}</h3>
        <p>{{ employee.designation.name }}</p>
        <p>{{ employee.department.name }}</p>
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
      this.fetchEmployees();
    },
  };
  </script>
  
  <style>
  .employee-card {
    padding: 10px;
    border: 1px solid #ccc;
    margin: 5px 0;
  }
  </style>
  