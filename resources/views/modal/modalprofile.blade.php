<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-2xl shadow-lg">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-semibold" id="profileModalLabel">Edit Profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
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
      </form>
    </div>
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
