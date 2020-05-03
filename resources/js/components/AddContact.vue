<template>
  <div>
    <b-icon-plus-circle variant="light" class="h1" v-b-modal.modal-prevent-closing></b-icon-plus-circle>

    <b-modal
      id="modal-prevent-closing"
      ref="modal"
      title="Contact"
      @show="resetModal"
      @hidden="resetModal"
      @ok="handleOk"
    >
     
    </b-modal>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      nameState: null,
    };
  },
  methods: {
    checkFormValidity() {
      const valid = this.$refs.form.checkValidity();
      this.nameState = valid;
      return valid;
    },
    resetModal() {
      this.name = "";
      this.nameState = null;
    },
    handleOk(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.handleSubmit();
    },
    handleSubmit() {
      // Exit when the form isn't valid
      if (!this.checkFormValidity()) {
        return;
      }
      // Push the name to submitted names
      this.submittedNames.push(this.name);
      // Hide the modal manually
      this.$nextTick(() => {
        this.$bvModal.hide("modal-prevent-closing");
      });
    }
  }
};
</script>

<style>
</style>