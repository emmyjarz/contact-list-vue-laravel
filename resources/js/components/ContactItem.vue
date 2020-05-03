<template>
   <div class="card mb-2">
      <div class="card-body">
        <h5 class="card-title">{{contact.name}}</h5>
        <div class="card-text">
            <div class="row mb-2">
                <div class="col">
                    <b>Email: </b><span>{{contact.email}}</span>
                </div>
                <div class="col">
                    <b>Phone: </b><span v-if="contact.phone">{{contact.phone}}</span><span v-else>N/A</span>
                </div>
            </div>
            <div><b>Birthday: </b><span v-if="contact.birthday">{{contact.birthday}}</span><span v-else>N/A</span></div>
            <div><b>Address: </b><span v-if="contact.address">{{contact.address}}</span><span v-else>N/A</span></div>
        </div>
        <div class="float-right btn-group btn-group-sm">
          <button @click="$emit('edit-contact', contact.id)" class="btn btn-primary">Edit</button>
          <button @click="$emit('del-contact', contact.id)" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
</template>

<script>
export default {
    name:'ContactItem',
    props: ['contact'],

}
</script>

<style>

</style>