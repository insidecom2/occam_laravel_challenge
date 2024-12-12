 <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUserAdd" aria-labelledby="offcanvasUserAddLabel">
     <div class="offcanvas-header">
         <h5 id="offcanvasUserAddLabel" class="offcanvas-title">Add User</h5>
         <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
     </div>
     <div class="offcanvas-body mx-0 flex-grow-0">
         <form class="ecommerce-customer-add pt-0" id="userAddForm" method="POST" accept="multipart/form-data"
             action="{{ route('users.store') }}">
             @csrf
             <div class="ecommerce-customer-add-basic mb-3">
                 <h6 class="mb-3">Basic Information</h6>
                 <div class="mb-3">
                     <x-input-label for="name" :value="__('Name')" />
                     <x-text-input id="name" class="block  w-full" type="text" name="name" :value="old('name')"
                         required autofocus autocomplete="name" />
                     <x-input-error :messages="$errors->get('name')" class="mt-2" />
                 </div>
                 <div class="mb-3">
                     <x-input-label for="email" :value="__('Email')" />
                     <x-text-input id="email" class="block  w-full" type="email" name="email" :value="old('email')"
                         required autofocus autocomplete="email" />
                     <x-input-error :messages="$errors->get('email')" class="mt-2" />
                 </div>
                 <div class="mb-3">
                     <x-input-label for="password" :value="__('Password')" />
                     <div class="input-group input-group-merge">
                         <x-text-input id="password" class="block   w-full" type="password" name="password"
                             :value="old('password')" required autofocus autocomplete=""
                             placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                         <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                     </div>
                     <x-input-error :messages="$errors->get('password')" class="mt-2" />
                 </div>

                 <div class="mb-3">
                     <x-input-label for="confirm_password" :value="__('Confirm Password')" />
                     <div class="input-group input-group-merge">
                         <x-text-input id="confirm_password" class="block  w-full" type="password"
                             name="confirm_password" :value="old('confirm_password')" required autofocus
                             autocomplete="confirm_password"
                             placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                         <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                     </div>
                     <x-input-error :messages="$errors->get('confirm_password')" class="mt-2" />
                 </div>

             </div>
             <div class="pt-3">
                 <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Add</button>
                 <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Discard</button>
             </div>
         </form>
     </div>
 </div>
