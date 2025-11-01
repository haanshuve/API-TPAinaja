  <!-- ✅ MODAL EDIT PROFIL -->
    <div x-show="openProfile" 
         x-transition.opacity.duration.300ms
         x-transition.scale.origin.center.duration.300ms
         x-cloak
         class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50" 
         @click.self="openProfile = false">

        <div class="bg-white rounded-xl shadow-lg p-6 w-[450px]">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Edit Profil</h2>

            <!-- 🖼️ Foto Profil -->
            <div class="flex items-center space-x-4 mb-4">
                <img id="profile-preview"
                     src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-avatar.png') }}" 
                     alt="Foto Profil"
                     class="w-16 h-16 rounded-full object-cover border border-gray-300">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Upload Foto Profil</label>
                    <input type="file" name="profile_picture" id="profile_picture"
                        class="mt-1 text-sm border border-gray-300 rounded-md px-2 py-1 focus:ring-2 focus:ring-[#FACC15] focus:outline-none"
                        accept="image/*"
                        onchange="previewProfile(event)">
                </div>
            </div>

            <!-- 🧾 Form -->
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-sm text-gray-700">Nama</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full border rounded-md px-2 py-1">
                    </div>
                    <div>
                        <label class="text-sm text-gray-700">Alamat</label>
                        <input type="text" name="address" value="{{ Auth::user()->address }}" class="w-full border rounded-md px-2 py-1">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-sm text-gray-700">Telepon</label>
                        <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="w-full border rounded-md px-2 py-1">
                    </div>
                    <div>
                        <label class="text-sm text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full border rounded-md px-2 py-1">
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-4">
                    <button type="button" @click="openProfile = false" 
                        class="px-4 py-2 rounded-md border text-red-500 border-gray-300 hover:bg-gray-100">Close</button>
                    <button type="submit" 
                        class="px-4 py-2 rounded-md bg-[#FACC15] hover:bg-[#EAB308] text-gray-900 font-semibold shadow-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- 🖼️ Preview Foto -->
    <script>
        function previewProfile(event) {
            const reader = new FileReader();
            reader.onload = function(){
                document.getElementById('profile-preview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
