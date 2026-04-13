<x-app-layout>
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0">Tes Kesehatan Mental</h5>
                                <small>{{ $patient->nama }} ({{ $patient->id_pasien }})</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Progress Bar -->
                        <div class="mb-4">
                            <p class="text-muted mb-2">
                                Pertanyaan <strong id="answered">0</strong> dari <strong>{{ $tests->count() }}</strong>
                            </p>
                            <div class="progress">
                                <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="{{ $tests->count() }}"></div>
                            </div>
                        </div>

                        <form id="testForm" action="{{ route('test.storeResults') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_pasien" value="{{ $patient->id_pasien }}">

                            @foreach($tests as $index => $test)
                                <div class="question-group mb-4 pb-3 border-bottom">
                                    <h6 class="mb-3">
                                        <span class="badge bg-secondary">No. {{ $index + 1 }}</span>
                                        {{ $test->pertanyaan }}
                                    </h6>

                                    <div class="ms-3">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input test-answer" type="radio" name="answers[{{ $test->id }}]"
                                                id="test_{{ $test->id }}_a" value="a" required>
                                            <label class="form-check-label" for="test_{{ $test->id }}_a">
                                                <strong>A.</strong> {{ $test->opsi_a ?? 'Tidak Pernah' }}
                                            </label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input class="form-check-input test-answer" type="radio" name="answers[{{ $test->id }}]"
                                                id="test_{{ $test->id }}_b" value="b" required>
                                            <label class="form-check-label" for="test_{{ $test->id }}_b">
                                                <strong>B.</strong> {{ $test->opsi_b ?? 'Jarang' }}
                                            </label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input class="form-check-input test-answer" type="radio" name="answers[{{ $test->id }}]"
                                                id="test_{{ $test->id }}_c" value="c" required>
                                            <label class="form-check-label" for="test_{{ $test->id }}_c">
                                                <strong>C.</strong> {{ $test->opsi_c ?? 'Kadang' }}
                                            </label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input class="form-check-input test-answer" type="radio" name="answers[{{ $test->id }}]"
                                                id="test_{{ $test->id }}_d" value="d" required>
                                            <label class="form-check-label" for="test_{{ $test->id }}_d">
                                                <strong>D.</strong> {{ $test->opsi_d ?? 'Sering' }}
                                            </label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input class="form-check-input test-answer" type="radio" name="answers[{{ $test->id }}]"
                                                id="test_{{ $test->id }}_e" value="e" required>
                                            <label class="form-check-label" for="test_{{ $test->id }}_e">
                                                <strong>E.</strong> {{ $test->opsi_e ?? 'Sangat Sering' }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="{{ route('patients.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-success btn-lg" id="submitBtn" disabled>
                                    <i class="bi bi-check-circle"></i> Selesaikan Tes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="alert alert-info mt-3">
                    <i class="bi bi-info-circle"></i>
                    <strong>Catatan:</strong> Semua pertanyaan wajib dijawab sebelum Anda dapat menyelesaikan tes.
                </div>
            </div>
        </div>
    </div>

    <script>
        const totalQuestions = {{ $tests->count() }};
        const testAnswers = document.querySelectorAll('.test-answer');
        const progressBar = document.getElementById('progressBar');
        const answeredCount = document.getElementById('answered');
        const submitBtn = document.getElementById('submitBtn');
        const testForm = document.getElementById('testForm');

        function updateProgress() {
            let answered = 0;
            const answers = document.querySelectorAll('input[type="radio"]:checked').length;

            for (let i = 1; i <= totalQuestions; i++) {
                const radios = document.querySelectorAll(`input[name="answers[${i}]"]`);
                let isAnswered = false;
                for (let radio of radios) {
                    if (radio.checked) {
                        isAnswered = true;
                        break;
                    }
                }
                if (isAnswered) answered++;
            }

            const percentage = (answered / totalQuestions) * 100;
            progressBar.style.width = percentage + '%';
            progressBar.setAttribute('aria-valuenow', answered);
            answeredCount.textContent = answered;

            if (answered === totalQuestions) {
                submitBtn.disabled = false;
                submitBtn.classList.add('btn-success');
            } else {
                submitBtn.disabled = true;
                submitBtn.classList.remove('btn-success');
            }
        }

        testAnswers.forEach(answer => {
            answer.addEventListener('change', updateProgress);
        });

        testForm.addEventListener('submit', function(e) {
            let allAnswered = true;
            for (let i = 1; i <= totalQuestions; i++) {
                const radios = document.querySelectorAll(`input[name="answers[${i}]"]`);
                let isAnswered = false;
                for (let radio of radios) {
                    if (radio.checked) {
                        isAnswered = true;
                        break;
                    }
                }
                if (!isAnswered) {
                    allAnswered = false;
                    break;
                }
            }

            if (!allAnswered) {
                e.preventDefault();
                alert('Semua pertanyaan harus dijawab!');
            }
        });

        // Initial progress update
        updateProgress();
    </script>
</x-app-layout>
