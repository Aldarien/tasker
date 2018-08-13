<div class="ui menu">
  <a href="{{url()}}" class="item">{{t('Home')}}</a>
  <div class="ui dropdown link item menu_dropdown">
    <span class="text">{{t('Tasks')}}</span>
    <i class="dropdown icon"></i>
    @include('layout.menu.tasks')
  </div>
  <div class="ui dropdown link item menu_dropdown">
    <span class="text">{{t('People')}}</span>
    <i class="dropdown icon"></i>
    @include('layout.menu.people')
  </div>
  <div class="ui dropdown link item menu_dropdown">
    <span class="text">{{t('Places')}}</span>
    <i class="dropdown icon"></i>
    @include('layout.menu.places')
  </div>
  <div class="ui dropdown link item menu_dropdown">
    <span class="text">{{t('Projects')}}</span>
    <i class="dropdown icon"></i>
    @include('layout.menu.projects')
  </div>
</div>
<br />

@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
  $('.ui.dropdown.menu_dropdown').dropdown({
    "on": 'hover',
    "action": 'none'
  });
});
</script>
@endpush
