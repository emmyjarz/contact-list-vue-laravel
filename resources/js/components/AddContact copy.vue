<template>
  <div>
    <a href title="Add Contact" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-plus fa-2x"></i>
    </a>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="addContact">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="First Name" v-model='firstname' name='firstname'>
                <small class='danger'></small>
              </div>
            </div>
            <!-- <div class="col">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="La Name">
                <small class='danger'></small>
              </div>
            </div> -->

          </div>
          <!-- <div class="form-group">
            <textarea class="form-control" id="message-text"></textarea>
          </div> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>








  </div>
</template>

<script>
export default {
  data() {
    return {
    firstname: '',
    errors: []
    };
  },
  methods: {
      addContact(e) {
          e.preventDefault();
          const newContact = {
              firstname: this.firstname,
          }
          this.$emit('add-contact', newContact)
      }
 
    }
  
};
</script>

<style>
</style>