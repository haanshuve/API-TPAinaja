<!-- ✅ MODAL EDIT PROFIL (Bootstrap) -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-2xl shadow-lg border-0 overflow-hidden">
      
      <!-- HEADER -->
      <div class="modal-header border-0 bg-[#FACC15]/10">
        <h5 class="modal-title fw-semibold text-gray-800" id="profileModalLabel">Edit Profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- FORM -->
      <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="modal-body space-y-4">

          <!-- 🖼️ FOTO PROFIL -->
          <div class="flex items-center space-x-4 mb-3">
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

          <!-- 🧾 DATA FORM -->
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
        </div>

        <!-- FOOTER -->
        <div class="modal-footer border-0 bg-gray-50 mt-2">
          <button type="button" class="btn btn-outline-secondary px-4 py-2 rounded-md" data-bs-dismiss="modal">
            Batal
          </button>
          <button type="submit" class="btn btn-warning text-gray-900 font-semibold px-4 py-2 rounded-md shadow-sm">
            Simpan
          </button>
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
