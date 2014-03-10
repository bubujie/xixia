        {if $MENU != ''}
		<!-- Menu -->
        <div class="dropmenu x" id="module-24">
        <div class="stroke clearfix">
          <ul class="menu">{$MENU}
            {if $MENU_SEARCH}
            <li class="" style="float:right">
              <form id="searchbox" action="search.php" method="get">
                <input type="hidden" value="position" name="orderby"/>
                <input type="hidden" value="desc" name="orderway"/>
                <input type="text" name="search_query" value="{if isset($smarty.get.search_query)}{$smarty.get.search_query}{/if}" />
              </form>
            </li>
            {/if}
          </ul>
        </div>
        </div>
		<!--/ Menu -->
        {/if}	