<template>
 
    <div id="flashBox" class = "fixed z-10 bottom-0 right-0 w-1/4 translate-y-full transition-transform duration-700 ease-in-out">


      <div v-if="flash.success" class="flex rounded-md bg-green-50 border-2 border-green-400 m-2 py-2">
        <div class="flex-shrink-0 px-2">
            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="flex-auto">
          {{ flash.success }}
        </div>
      </div>

      <div v-if="flash.error" class="flex rounded-md bg-red-50 border-2 border-red-400 m-2 py-2">
        <div class="flex-shrink-0 px-2">
          <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
          </svg>      
        </div>
        <div class="flex-auto">
          {{ flash.error }}
        </div>
      </div>

  </div>

  </template>
  
  <script>

  export default {
    props: {
      flash: {
        type: Object,
        default: () => ({})
      }
    },
    mounted() {
      if (this.flash.success || this.flash.error) {
        setTimeout(() => {
          this.flash.success = null;
          this.flash.error = null;
        }, 3000);
      }

    const flashBox = document.getElementById('flashBox');
    setTimeout(() =>{
      flashBox.classList.remove('translate-y-full');
    }, 0);
   

    }
  }


  </script>