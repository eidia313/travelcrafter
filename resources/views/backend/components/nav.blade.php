<aside class="sidebar">
  <div class="sidebar__profile d-flex align-items-center">
    <span class="sidebar__profile--canv">@php echo substr(Auth::user()->name, 0 , 1 ); @endphp</span>
    <div class="sidebar__profile--det">
      <h6>@php echo substr(Auth::user()->name, 0 , 17); @endphp...</h6>
      <a href="#">Edit Profile</a>
    </div>
  </div>
  <nav class="sidebar__nav">
    <ul>
      <li>
        <a href="{{route('country.index')}}" class="{{ Request::is(['admin/destination/country', 'admin/destination/country/*', 'admin/destination/region', 'admin/destination/region/*', 'admin/destination/city', 'admin/destination/city/*']) ? 'active' : '' }}">Destinations</a>
        <ul>
          <li>
            <a href="{{route('country.index')}}" class="{{ Request::is(['admin/destination/country', 'admin/destination/country/*']) ? 'active' : '' }}">Country</a>
          </li>
          <li>
            <a href="{{route('region.index')}}" class="{{ Request::is(['admin/destination/region', 'admin/destination/region/*']) ? 'active' : '' }}">Region</a>
          </li>
          <li>
            <a href="{{route('city.index')}}" class="{{ Request::is(['admin/destination/city', 'admin/destination/city/*']) ? 'active' : '' }}">City</a>
          </li>
        </ul>
      </li>
      <li>
        <a href="{{route('activity.index')}}" class="{{ Request::is(['admin/activities/activity', 'admin/activities/activity/*']) ? 'active' : '' }}">Activities</a>
        <ul>
          <li>
            <a href="{{route('activity.index')}}" class="{{ Request::is(['admin/activities/activity', 'admin/activities/activity/*']) ? 'active' : '' }}">Activity</a>
          </li>
        </ul>
      </li>
      <!-- Packages Nav -->
      <li>
        <a href="{{route('package.index')}}" class="{{ Request::is(['admin/packages/', 'admin/packages/*']) ? 'active' : '' }}">Packages</a>
        <ul>
          <li>
            <a href="{{route('package.index')}}" class="{{ Request::is(['admin/packages/package', 'admin/packages/package/*']) ? 'active' : '' }}">Package</a>
          </li>
          <li>
            <a href="{{route('difficulty.index')}}" class="{{ Request::is(['admin/packages/difficulty', 'admin/packages/difficulty/*']) ? 'active' : '' }}">Difficulty</a>
          </li>
          <li>
            <a href="{{ route('booking.index') }}" class="{{ Request::is(['admin/packages/booking', 'admin/packages/booking/*']) ? 'active' : '' }}">Inquiries</a>
          </li>
        </ul>
      </li>
      <!-- Welfare Nav -->
      <li>
        <a href="{{route('welfare.index')}}" class="{{ Request::is(['admin/welfares/welfare', 'admin/welfares/welfare/*']) ? 'active' : '' }}">Welfares</a>
        <ul>
          <li>
            <a href="{{route('welfare.index')}}" class="{{ Request::is(['admin/welfares/welfare', 'admin/welfares/welfare/*']) ? 'active' : '' }}">Social Welfare</a>
          </li>
        </ul>
      </li>
      <!-- Checklist Nav -->
      <li>
        <a href="{{ route('equipments.index') }}" class="{{ Request::is(['admin/checklists/equipments', 'admin/checklists/*']) ? 'active' : '' }}">Checklists</a>
        <ul>
          <li>
            <a href="{{ route('equipments.index') }}" class="{{ Request::is(['admin/checklists/equipments', 'admin/checklists/equipment/*']) ? 'active' : '' }}">Equipment</a>
          </li>
          <li>
            <a href="{{ route('category.index') }}" class="{{ Request::is(['admin/checklists/category', 'admin/checklists/category/*']) ? 'active' : '' }}">Category</a>
          </li>
          <li>
          <a href="{{ route('groups.index') }}" class="{{ Request::is(['admin/checklists/groups', 'admin/checklists/groups/*']) ? 'active' : '' }}">Group</a>
          </li>
        </ul>
      </li>
      <!-- Partners-->
      <li>
        <a href="{{ route('clist.index') }}" class="{{ Request::is(['admin/partners/clist', 'admin/partners/*']) ? 'active' : '' }}">Partners</a>
        <ul>
          <li>
            <a href="{{ route('clist.index') }}" class="{{ Request::is(['admin/partners/clist', 'admin/partners/clist/*']) ? 'active' : '' }}">Partners</a>
          </li>
          <li>
            <a href="{{ route('ccountry.index') }}" class="{{ Request::is(['admin/partners/ccountry', 'admin/partners/ccountry/*']) ? 'active' : '' }}">Country</a>
          </li>
        </ul>
      </li>
      <!-- Places -->
      <li>
        <a href="{{ route('leisure.index') }}" class="{{ Request::is(['admin/activities/leisure', 'admin/activities/placetype',  'admin/activities/placetype/*', 'admin/activities/leisure/*']) ? 'active' : '' }}">Leisure Activity</a>
        <ul>
          <li>
            <a href="{{route('placetype.index')}}" class="{{ Request::is(['admin/activities/placetype', 'admin/activities/placetype/*']) ? 'active' : '' }}">Place Type</a>
          </li>
        </ul>
      </li>
      <!-- Services-->
      <li>
        <a href="{{ route('service.index') }}" class="{{ Request::is(['admin/services/service', 'admin/services/*']) ? 'active' : '' }}">Services</a>
      </li>
      <!-- Inquiries -->
      <li>
        <a href="{{ route('contact.index') }}" class="{{ Request::is(['admin/inquiries/contact', 'admin/inquiries/contact/*']) ? 'active' : '' }}">Inquiries</a>
      </li>
      <!-- Tailor Made Trips Nav -->
      <li>
        <a href="{{route('admin.trips')}}" class="{{ Request::is(['admin/tailor-made-trips', 'admin/tailor-made-trips/*']) ? 'active' : '' }}">Tailor Made Trips</a>
      </li>
      <!-- Pages Nav -->
      <li>
        <a href="{{ route('pages.index') }}" class="{{ Request::is(['admin/pages', 'admin/pages/*']) ? 'active' : '' }}">Pages</a>
      </li>
      <!-- FAQ Nav -->
      <li>
        <a href="{{ route('faq.index') }}" class="{{ Request::is(['admin/faq', 'admin/faq/*']) ? 'active' : '' }}">FAQ</a>
      </li>
      <!--Teams Nav-->
      <li>
        <a href="{{route('team.index')}}" class="{{ Request::is(['admin/teams', 'admin/teams/*']) ? 'active' : '' }}">Teams</a>
      </li>
      <!--Testimonial Nav-->
      <li>
        <a href="{{route('testimonial.index')}}" class="{{ Request::is(['admin/testimonial', 'admin/testimonial/*']) ? 'active' : '' }}">Testimonial</a>
      </li>
      <!-- Settings Nav -->
      <li>
        <a href="{{route('setting.edit', 1)}}" class="{{ Request::is(['admin/site/setting', 'admin/site/setting/*']) ? 'active' : '' }}">Settings</a>
        <ul>
          <li>
            <a href="{{route('setting.edit', 1)}}" class="{{ Request::is(['admin/site/setting', 'admin/site/setting/*']) ? 'active' : '' }}">Site Settings</a>
          </li>
          <!-- <li>
            <a href="#">Company Settings</a>
          </li>
          <li>
            <a href="#">Account Settings</a>
          </li> -->
        </ul>
      </li>
    </ul>
  </nav>
</aside>
