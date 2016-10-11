@extends('layouts.main')

@section('page-styles')

    <link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
    <link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
    <link rel="stylesheet" href="/assets/plugins/datetimepicker/style.css">
@endsection

@section('content')

    <div class="container content">
        <div class="row">
            <div class="col-md-9">

                <!-- Incident Form -->
                <form action="{{ route('incident.store') }}" id="sky-form" class="sky-form" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <header>{{ trans('incident.form_title') }}</header>

                    @include('partials.errors')

                    <fieldset>
                            <section class="">
                                <label class="label">Naslov</label>
                                <label for="title" class="input">
                                    <input type="text" id="title" name="title" autocomplete="off" spellcheck="false" value="{{ old('title') }}"  placeholder="{{ trans('incident.placeholders.title') }}" class="required">
                                </label>
                            </section>

                            <section>
                                <label class="label">Detaljan opis</label>
                                <label class="textarea">
                                    <textarea rows="3"  autocomplete="off" spellcheck="false" name="info" placeholder="{{ trans('incident.placeholders.description') }}">{{ old('info') }}</textarea>
                                </label>
                            </section>

                            <section class="">
                                <label class="label">Vrsta prekršaja</label>
                                <label for="violation" class="select select-multiple">
                                    <select name="violations[]" multiple class="required">
                                        @foreach($violations as $violation)
                                            <option value="{{ $violation->id }}" {{ in_array( $violation->id, old('violations') == null ? [] : old('violations')) ? 'selected' : '' }}>{{ $violation->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                                <div class="note">
                                    <strong>Pažnja:</strong> drži ctrl/cmd tipku ako želiš da selektuješ više prekršaja.
                                </div>
                            </section>

                        <div class="row">
                            <section class="col col-6">
                                <label class="label">Vrijeme kada se prekršaj dogodio</label>
                                <label for="occurred_at" class="input">
                                    <i class="icon-prepend fa fa-clock-o"></i>
                                    <input type="text"  autocomplete="off" spellcheck="false" id="occurred_at" name="occurred_at" placeholder="{{ trans('incident.placeholders.occurred_at') }}" value="{{ old('occurred_at') != null ? old('occurred_at') :  date('d-m-Y H:i', time()) }}">
                                </label>
                            </section>
                        </div>



                        <div class="row">
                            <section class="col col-6">
                                <label class="label">Grad</label>
                                <label class="select">
                                    <select name="city_id" class="required">
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="label">Lokacija</label>
                                <label class="input">
                                    <i class="icon-prepend fa fa-map-pin"></i>
                                    <input name="location"  autocomplete="off" spellcheck="false" placeholder="{{ trans('incident.placeholders.location') }}">
                                </label>
                            </section>
                        </div>
                    </fieldset>

                    <fieldset>
                        <p>Počinilac / Počinioci</p>

                        <div class="row" id="plate-row-1">
                            <section class="col col-5">
                                <label class="input">
                                    <i class="icon-prepend fa fa-car"></i>
                                    <input name="plates[]"  autocomplete="off" spellcheck="false" placeholder="{{ trans('incident.placeholders.plates') }}" class="required">
                                </label>
                                <div class="note plates">
                                    <strong>Pažnja:</strong> unesi tablice bez razmaka, samo slova i brojevi.
                                </div>
                            </section>

                            <section class="col col-2 add-plate"  id="add-plate-1">
                                <button class="btn-u pull-right btn-u-sm btn-u-default" id="add-plates" type="button">+1 vozilo</button>
                            </section>
                        </div>

                        <div id="append-plates"></div>

                    </fieldset>

                    <fieldset>
                        <p>Priloži video ili slike</p>

                        <div class="row" id="upload-row-1">
                            <section class="col col-10">
                                <label class="input input-file">
                                    <div class="button"><input type="file" name="uploads[]" id="file" class="file-input" onchange="this.parentNode.nextSibling.value = this.value">{{ trans('incident.placeholders.browse') }}</div><input type="text" readonly>
                                </label>
                                <div class="note uploads">
                                    <strong>Dozvoljeni formati:</strong> jpg, png, mp4.
                                </div>
                            </section>

                            <section class="col col-2 add-upload" id="add-upload-1">
                                <button class="btn-u pull-right btn-u-sm btn-u-default" id="add-uploads" type="button">+1 fajl</button>
                            </section>
                        </div>

                        <div id="append-uploads"></div>

                        <p>Imaš Youtube link?</p>

                        <section class="">
                            <label class="label">Unesi link</label>
                            <label for="yt_link" class="input">
                                <input type="text" id="yt_link" name="yt_link" autocomplete="off" spellcheck="false" value="{{ old('yt_link') }}"  placeholder="">
                            </label>
                        </section>

                    </fieldset>

                    <footer>
                        <button type="submit" class="btn-u">{{ trans('incident.placeholders.report') }}</button>
                    </footer>
                </form>
                <!-- End Incident Form -->
            </div>
        </div>
    </div>


@endsection

@section('footer-scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#occurred_at').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:00'
            });

            $('#add-plates').on('click', function () {
                var plateRow = $('div[id^="plate-row-"]:last');
                var num = parseInt( plateRow.prop("id").match(/\d+/g), 10 ) +1;
                var plateRowClone = plateRow.clone().prop('id', 'plate-row-' + num);
                plateRowClone.find('.add-plate').remove();
                plateRow.find('.note.plates').remove();
                plateRowClone.find('input').val('');
                $(plateRowClone).insertBefore($('#append-plates'));
            });

            $('#add-uploads').on('click', function () {
                var uploadRow = $('div[id^="upload-row-"]:last');
                var num = parseInt( uploadRow.prop("id").match(/\d+/g), 10 ) +1;
                var uploadRowClone = uploadRow.clone().prop('id', 'upload-row-' + num);
                uploadRowClone.find('.add-upload').remove();
                uploadRow.find('.note.uploads').remove();
                uploadRowClone.find('input').val('');
                uploadRowClone.find('input.file-input').val('');
                $(uploadRowClone).insertBefore($('#append-uploads'));
            });
        });
    </script>

@endsection