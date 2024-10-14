<template>
    <CreateDeleteComponent forAttribute="teacher">
      <template #labelRole>
        Teacher Role
      </template>

      <template #createRole>
        Create Teacher
      </template>

      <template #deleteRole>
        Delete Teacher
      </template>
    </CreateDeleteComponent>

    <!-- Guardian buttons -->
    <CreateDeleteComponent forAttribute="guardian">
      <template #labelRole>
        Guardian Role
      </template>

      <template #createRole>
        Create Guardian
      </template>

      <template #deleteRole>
        Delete Guardian
      </template>
    </CreateDeleteComponent>

    <!-- Student buttons -->
    <CreateDeleteComponent forAttribute="student">
      <template #labelRole>
        Student Role
      </template>

      <template #createRole>
        Create Student
      </template>

      <template #deleteRole>
        Delete Student
      </template>
    </CreateDeleteComponent>

    <!-- Class buttons -->
    <CreateDeleteComponent forAttribute="class">
      <template #labelRole>
        Class Role
      </template>

      <template #createRole>
        Create Class
      </template>

      <template #deleteRole>
        Delete Class
      </template>
    </CreateDeleteComponent>
  </template>

  <script setup>
  import CreateDeleteComponent from '../CreateDeleteComponent.vue';
  </script>
