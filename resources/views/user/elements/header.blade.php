<!-- Backgroud Black -->
<div class="header-top top-bg d-none d-lg-block">
    <div class="container">
        <ul>
            <li class="dropdown">
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="language">
                    {{ trans('language') }}
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('localization', ['en']) }}">{{ trans('language.english') }}</a>
                    <a class="dropdown-item" href="{{ route('localization', ['vi']) }}">{{ trans('language.vietnamese') }}</a>
                </div>
            </li>
        </ul>
    </div>
</div>
<style type="text/css">
    header #language {
        letter-spacing: 0;
        font-size: 15px;
        padding: 15px;
    }
</style>
