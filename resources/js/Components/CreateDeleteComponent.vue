<script setup>

  // Define a prop for the 'for' attribute in the label
  defineProps({
    forAttribute: {
      type: String,
      required: true
    }
  });
</script>

<template>
  <div class="flex mt-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="w-1/2">
      <div class="flex flex-col space-y-1">
        <div class="">
          <!-- Bind the 'for' attribute dynamically using the prop -->
          <label :for="forAttribute">
            <slot name="labelRole"></slot>
          </label>
          <div class="flex p-2 items-center space-x-3">
            <button class="border border-green-500 hover:border-green-900 text-green-900 py-2 px-3 rounded-md">
              <slot name="createRole"></slot>
            </button>
            <button class="border border-red-500 hover:border-red-900 text-red-500 py-2 px-3 rounded-md">
              <slot name="deleteRole"></slot>
            </button>
            <button class="border border-blue-500 hover:border-blue-900 text-blue-500 py-2 px-3 rounded-md">
              <slot name="showRole"></slot>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="w-1/2"></div>
  </div>

</template>
