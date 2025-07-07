<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('proposals.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        Add proposal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-12">
                            <label for="name">proposal
                                <span class="text-danger">*
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <input id="name" type="text" name="name" class="form-control"
                                value="{{ old('name') }}" placeholder="أدخل اسم الproposal" required="الحقل مطلوب">
                        </div>

                        <div class="col-12 mt-10">
                            <label for="lowest_acceptance_rate">اقل معدل للقبول
                                <span class="text-danger">*
                                    @error('lowest_acceptance_rate')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <input id="lowest_acceptance_rate" type="number" name="lowest_acceptance_rate"
                                class="form-control" min="50" value="{{ old('lowest_acceptance_rate') }}"
                                placeholder="اقل معدل للقبول" required="الحقل مطلوب">
                        </div>
                        <div class="col-12 mt-10">
                            <label for="Price">السعر
                                <span class="text-danger">*
                                    @error('Price')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <input id="Price" type="number" name="Price" class="form-control" min="1"
                                value="{{ old('Price') }}" placeholder="السعر" required="الحقل مطلوب">
                        </div>
                        <div class="col-12 mt-10">
                            <label for="Number_of_years_of_study">عدد السنين الدراسية
                                <span class="text-danger">*
                                    @error('Number_of_years_of_study')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <input id="Number_of_years_of_study" type="number" name="Number_of_years_of_study"
                                class="form-control" min="1" value="{{ old('Number_of_years_of_study') }}"
                                placeholder="أدخل عدد السنين الدراسية" required="الحقل مطلوب">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">اضافة</button>
                </div>
            </form>
        </div>
    </div>
</div>
