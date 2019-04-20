<template>
    <div>
        <div>
            <div class="border-b pb-2 mb-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm uppercase tracking-wide font-semibold mr-4">OAuth Clients</span>

                    <a class="text-sm font-semibold cursor-pointer text-blue no-underline hover:underline" @click="toggleCreateClientForm">Create New</a>
                </div>

                <div v-show="clientModal">
                    <div class="mt-2">
                        <div v-show="createForm.errors.length > 0" class="mb-2 bg-red-lightest rounded p-3 text-sm text-red">
                            <ul class="ml-3 pl-3">
                                <li v-for="error in createForm.errors" v-text="error"></li>
                            </ul>
                        </div>

                        <div class="flex">
                            <div class="mr-2">
                                <input
                                    @keyup.enter="store"
                                    v-model="createForm.name"
                                    placeholder="Name"
                                    class="appearance-none w-full h-full border p-2 rounded text-sm text-grey-darker focus:outline-none focus:border-blue"
                                    type="text"
                                >
                            </div>

                            <div class="flex-1 mr-2">
                                <input
                                    @keyup.enter="store"
                                    v-model="createForm.redirect"
                                    placeholder="Redirect URL"
                                    class="appearance-none w-full h-full border p-2 rounded text-sm text-grey-darker focus:outline-none focus:border-blue"
                                    type="text"
                                >
                            </div>

                            <div>
                                <button
                                    @click.prevent="store"
                                    type="submit"
                                    class="block appearance-none h-full rounded text-sm bg-blue hover:bg-blue-dark text-white px-4 py-2"
                                >Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <p v-if="!clients.length">You have not created any clients.</p>

                <div v-else>
                    <div class="-mb-6">
                        <div v-for="client in clients" class="border border-grey-lighter bg-grey-lightest rounded flex flex-col lg:flex-row lg:justify-between p-3 mb-6">
                            <div class="mb-3 lg:mb-0">
                                <div class="font-semibold text-grey-darkest mb-3" v-text="client.name"></div>

                                <div class="flex items-baseline text-sm">
                                    <div class="font-semibold w-16 text-right flex-no-shrink">Client ID</div>
                                    <div v-text="client.id" class="ml-2 font-mono text-grey-dark"></div>
                                </div>

                                <div class="flex items-baseline text-sm">
                                    <div class="font-semibold w-16 text-right flex-no-shrink">Redirect</div>
                                    <div v-text="client.redirect" class="ml-2 font-mono text-grey-dark"></div>
                                </div>

                                <div class="flex items-baseline text-sm break-words">
                                    <div class="font-semibold w-16 text-right flex-no-shrink">Secret</div>
                                    <div class="w-auto ml-2 font-mono text-grey-dark">
                                        <passport-secret :text="client.secret"></passport-secret>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-no-shrink lg:self-center flex items-center">
                                <a @click="edit(client)" class="text-sm border hover:border-grey bg-white rounded px-3 py-1 cursor-pointer no-underline mr-3">Edit</a>
                                <a @click="destroy(client)" class="text-sm border hover:border-grey bg-white rounded px-3 py-1 cursor-pointer no-underline">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="hidden table">
                    <thead>
                        <tr>
                            <th>Client ID</th>
                            <th>Name</th>
                            <th>Secret</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="client in clients">
                            <!-- ID -->
                            <td class="align-middle">
                                {{ client.id }}
                            </td>

                            <!-- Name -->
                            <td class="align-middle">
                                {{ client.name }}
                            </td>

                            <!-- Secret -->
                            <td class="align-middle">
                                <div class="font-mono border rounded bg-grey-lightest px-2 py-1">{{ client.secret }}</div>
                            </td>

                            <!-- Edit Button -->
                            <td class="align-middle">
                                <a class="action-link" @click="edit(client)">
                                    Edit
                                </a>
                            </td>

                            <!-- Delete Button -->
                            <td class="align-middle">
                                <a class="action-link text-danger" @click="destroy(client)">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Edit Client Modal -->
        <div class="hidden modal fade" id="modal-edit-client" tabindex="-1" role="dialog" :class="[]">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <a class="delete" @click.prevent="closeEditClientModal"></a>

                        <h4 class="modal-title">
                            Edit Client
                        </h4>
                    </div>

                    <div class="modal-body">
                        <!-- Form Errors -->
                        <div class="notification is-danger" v-if="editForm.errors.length > 0">
                            <strong>Whoops! Something went wrong!</strong>
                            <br>
                            <ul>
                                <li v-for="error in editForm.errors">
                                    {{ error }}
                                </li>
                            </ul>
                        </div>

                        <!-- Edit Client Form -->
                        <form class="form-horizontal" role="form">
                            <!-- Name -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name</label>

                                <div class="col-md-7">
                                    <input id="edit-client-name" type="text" class="form-control"
                                                                @keyup.enter="update" v-model="editForm.name">

                                    <span class="help-block">
                                        Something your users will recognize and trust.
                                    </span>
                                </div>
                            </div>

                            <!-- Redirect URL -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Redirect URL</label>

                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="redirect"
                                                    @keyup.enter="update" v-model="editForm.redirect">

                                    <span class="help-block">
                                        Your application's authorization callback URL.
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="button" class="btn btn-primary" @click="update">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                clients: [],

                createForm: {
                    errors: [],
                    name: '',
                    redirect: ''
                },

                editForm: {
                    errors: [],
                    name: '',
                    redirect: ''
                },

                clientModal: false,
                editClientModal: false
            };
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.getClients();
        },

        methods: {
            /**
             * Get all of the OAuth clients for the user.
             */
            getClients() {
                axios.get('/oauth/clients').then(({ data }) => this.clients = data);
            },

            /**
             * Show the form for creating new clients.
             */
            toggleCreateClientForm() {
                this.clientModal = !this.clientModal
            },

            /**
             * Create a new OAuth client for the user.
             */
            store() {
                this.persistClient(
                    'post', '/oauth/clients',
                    this.createForm, '#modal-create-client'
                );
            },

            /**
             * Edit the given client.
             */
            edit(client) {
                this.editForm.id = client.id;
                this.editForm.name = client.name;
                this.editForm.redirect = client.redirect;

                this.closeEditClientModal()
            },

            /**
             * Update the client being edited.
             */
            update() {
                this.persistClient(
                    'put', '/oauth/clients/' + this.editForm.id,
                    this.editForm, '#modal-edit-client'
                );
            },

            /**
             * Persist the client to storage using the given form.
             */
            persistClient(method, uri, form, modal) {
                form.errors = [];

                axios[method](uri, form)
                    .then(() => {
                        this.getClients();

                        form.name = '';
                        form.redirect = '';
                        form.errors = [];

                        this.closeClientModal()
                        this.closeEditClientModal()
                    })
                    .catch(({ data }) => {
                        // TODO: Assign form.errors to data.
                        if (typeof data === 'object') {
                            form.errors = _.flatten(_.toArray(data));
                        } else {
                            form.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },

            /**
             * Destroy the given client.
             */
            destroy(client) {
                axios.delete('/oauth/clients/' + client.id).then(this.getClients);
            },

            closeClientModal () {
              this.clientModal = false
            },

            closeEditClientModal () {
              this.editClientModal = false
            }
        }
    }
</script>
