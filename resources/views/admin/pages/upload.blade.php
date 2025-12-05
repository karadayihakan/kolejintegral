<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0 fw-bold" style="font-size: 1.5rem; color: #1f2937;">
                {{ __('PDF Dosyası Yükle') }}
            </h2>
            <a href="{{ route('dashboard.pages.index') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Geri Dön
            </a>
        </div>
    </x-slot>

    <div style="padding: 1.5rem 0;">
        <div class="container-fluid px-4">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <form id="uploadForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="pdf_file" class="form-label">PDF Dosyası Seç <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="pdf_file" name="upload" accept=".pdf" required>
                            <small class="text-muted">Maksimum 10MB, sadece PDF dosyaları</small>
                        </div>
                        
                        <div id="uploadProgress" class="progress mb-3" style="display: none;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
                        </div>

                        <div id="uploadResult" class="alert d-none"></div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary" id="uploadBtn">
                                <i class="fa-solid fa-upload"></i> Yükle
                            </button>
                            <button type="button" class="btn btn-secondary" onclick="window.close()">Kapat</button>
                        </div>
                    </form>

                    <div id="fileUrlContainer" class="mt-4" style="display: none;">
                        <h5>Yüklenen Dosya URL'si:</h5>
                        <div class="input-group">
                            <input type="text" class="form-control" id="fileUrl" readonly>
                            <button class="btn btn-outline-secondary" type="button" onclick="copyToClipboard()">
                                <i class="fa-solid fa-copy"></i> Kopyala
                            </button>
                        </div>
                        <small class="text-muted">Bu URL'yi CKEditor'da link butonuna tıklayarak ekleyebilirsiniz.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(function() {
            $('#uploadForm').on('submit', function(e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                var $uploadBtn = $('#uploadBtn');
                var $progress = $('#uploadProgress');
                var $result = $('#uploadResult');
                var $urlContainer = $('#fileUrlContainer');
                
                $uploadBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Yükleniyor...');
                $progress.show();
                $result.addClass('d-none');
                $urlContainer.hide();
                
                $.ajax({
                    url: "{{ route('dashboard.pages.upload') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = (evt.loaded / evt.total) * 100;
                                $progress.find('.progress-bar').css('width', percentComplete + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    success: function(response) {
                        $progress.hide();
                        $result.removeClass('d-none alert-danger').addClass('alert-success').html('Dosya başarıyla yüklendi!');
                        $('#fileUrl').val(response.url);
                        $urlContainer.show();
                        
                        // Parent window'a mesaj gönder (eğer popup ise)
                        if (window.opener) {
                            window.opener.postMessage({
                                type: 'pdf_uploaded',
                                url: response.url
                            }, '*');
                        }
                    },
                    error: function(xhr) {
                        $progress.hide();
                        var errorMsg = 'Dosya yüklenirken bir hata oluştu!';
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMsg = xhr.responseJSON.error.message || errorMsg;
                        }
                        $result.removeClass('d-none alert-success').addClass('alert-danger').html(errorMsg);
                    },
                    complete: function() {
                        $uploadBtn.prop('disabled', false).html('<i class="fa-solid fa-upload"></i> Yükle');
                    }
                });
            });
        });

        function copyToClipboard() {
            var urlInput = document.getElementById('fileUrl');
            urlInput.select();
            document.execCommand('copy');
            alert('URL kopyalandı!');
        }
    </script>
</x-app-layout>

