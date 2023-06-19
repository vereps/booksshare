<script setup lang="ts">
</script>

<template>
  <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
    <div class="col mb-3">
      <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <p class="text-muted">© 2023</p>
    </div>

    <div class="col mb-3"></div>

    <div class="col mb-3">
      <h5>Home section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><router-link class="nav-link" to="/">Home</router-link></li>
      </ul>
    </div>

    <div class="col mb-3">
      <h5>About section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><router-link class="nav-link" to="/about">About</router-link></li>
      </ul>
    </div>

    <div class="col mb-3">
      <h5>Books section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><router-link class="nav-link" to="/books">Books</router-link></li>
      </ul>
    </div>
  </footer>
</template>
