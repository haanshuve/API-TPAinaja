<!-- ✅ MODAL EDIT PROFIL -->
<div 
    x-show="openProfile"
    x-transition.opacity.duration.300ms
    x-transition.scale.origin.center.duration.300ms
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40"
    @keydown.escape.window="openProfile = false"
    @click.self="openProfile = false"
>
    <div 
        class="bg-white rounded-xl shadow-lg p-6 w-[450px] relative"
        @click.stop
    >
        <!-- ❌ Tombol Tutup di Pojok Kanan -->
        <button 
            @click="openProfile = false"
            class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 transition"
        >
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>

        <!-- 🏷️ Judul -->
        <h2 class="text-xl font-semibold mb-5 text-gray-800">Edit Profil</h2>

        <!-- 🖼️ Foto Profil -->
        <div class="flex items-center gap-4 mb-5">
            <img id="profile-preview"
                src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-avatar.png') }}" 
                alt="Foto Profil"
                class="w-16 h-16 rounded-full object-cover border border-gray-300">
            
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Upload Foto Profil</label>
                <input 
                    type="file" 
                    name="profile_picture" 
                    id="profile_picture"
                    accept="image/*"
                    onchange="previewProfile(event)"
                    class="w-full text-sm border border-gray-300 rounded-md px-2 py-1 focus:ring-2 focus:ring-[#FACC15] focus:outline-none"
                >
            </div>
        </div>

        <!-- 🧾 Form -->
        <form 
            action="{{ route('profile.update') }}" 
            method="POST" 
            enctype="multipart/form-data" 
            class="space-y-4"
        >
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="text-sm text-gray-700 mb-1 block">Nama</label>
                    <input type="text" name="name" 
                        value="{{ Auth::user()->name }}" 
                        class="w-full border border-gray-300 rounded-md px-2 py-1 focus:ring-2 focus:ring-[#FACC15] focus:outline-none">
                </div>
                <div>
                    <label class="text-sm text-gray-700 mb-1 block">Alamat</label>
                    <input type="text" name="address" 
                        value="{{ Auth::user()->address }}" 
                        class="w-full border border-gray-300 rounded-md px-2 py-1 focus:ring-2 focus:ring-[#FACC15] focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="text-sm text-gray-700 mb-1 block">Telepon</label>
                    <input type="text" name="phone" 
                        value="{{ Auth::user()->phone }}" 
                        class="w-full border border-gray-300 rounded-md px-2 py-1 focus:ring-2 focus:ring-[#FACC15] focus:outline-none">
                </div>
                <div>
                    <label class="text-sm text-gray-700 mb-1 block">Email</label>
                    <input type="email" name="email" 
                        value="{{ Auth::user()->email }}" 
                        class="w-full border border-gray-300 rounded-md px-2 py-1 focus:ring-2 focus:ring-[#FACC15] focus:outline-none">
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 mt-5">
                <button 
                    type="button" 
                    @click="openProfile = false" 
                    class="px-4 py-2 rounded-md border border-gray-300 text-gray-600 hover:bg-gray-100 transition"
                >
                    Batal
                </button>
                <button 
                    type="submit" 
                    class="px-4 py-2 rounded-md bg-[#FACC15] hover:bg-[#EAB308] text-gray-900 font-semibold shadow-sm transition"
                >
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- 🖼️ Preview Foto -->
<script>
function previewProfile(event) {
    const reader = new FileReader();
    reader.onload = function() {
        document.getElementById('profile-preview').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
