<?php
$pageSlug = null;
?>
<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('CU') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('Customer') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ url('/customer-home') }}">
                    <i class="tim-icons icon-bank"></i>
                    <p>{{ _('Home') }}</p>
                </a>
            </li>
          
          
           
            
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="/customer-home">
                    <i class="tim-icons icon-bag-16"></i>
                    <p>{{ _('Products') }}</p>
                </a>
            </li>
           
        </ul>
    </div>
</div>
