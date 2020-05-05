<template>
   <div class="card mb-2">
      <div class="card-body">
        <h5 class="card-title">{{contact.firstname}} {{contact.lastname}}</h5>
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
            <div><b>Address: </b><span v-if="contact.address">{{contact.address.address1}} {{contact.address.address2}} {{contact.address.city}}, {{contact.address.state}} {{contact.address.zip}}</span><span v-else>N/A</span></div>
        </div>
        <div class="float-right btn-group btn-group-sm">
          <button @click="$emit('edit-contact', contact)" class="btn btn-primary">Edit</button>
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