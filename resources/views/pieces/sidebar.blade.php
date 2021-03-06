<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  @if (@$app_id === 'home')
  <form @submit.prevent="searchSites">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Search site" v-model="keyword">
      <span v-if="searchSitesLoading">
        Loading...
      </span>
    </div>
  </form>
  @endif
  <ul class="nav menu">
    @if (@$app_id === 'home')
    <li :class="{active: timelineLabel == 'all' && !(timeline && timeline.site)}">
      <a href="javascript:void(0)" @click="getTimeLine({type: 'all'})">
        <span class="glyphicon glyphicon-home"></span>
        All
      </a>
    </li>
    <li :class="{active: timelineLabel == 'today' && !(timeline && timeline.site)}">
      <a href="javascript:void(0)" @click="getTimeLine({type: 'today'})">
        <span class="glyphicon glyphicon-flag"></span>
        Today
      </a>
    </li>
    <li :class="{active: timelineLabel === 'Top Articles'}">
      <a href="javascript:void(0)" @click="getTopArticles()">
        <span class="fa fa-line-chart"></span>
        Top Articles
      </a>
    </li>
    <li :class="{active: timelineLabel == 'My Saved Articles' && !(timeline && timeline.site)}">
      <a @click="getSavedArticles()" href="javascript:void(0)">
        <span class="fa fa-save"></span>
        Saved Articles
        <span class="label-count">@{{savedArticlesCount}}</span>
      </a>
    </li>
    <li class="parent ">
      <a data-toggle="collapse" href="#collect" @mouseenter="mouseEnter" @mouseleave="mouseLeave">
        <span class="glyphicon glyphicon-tags"></span>
        Collections
        <span class="fa fa-gear" style="float: right;" v-show="manageCollectionShow" @click="mouseClick"></span>
      </a>
      <ul class="children collapse" id="collect">
        <span v-if="!collections.length">Loading...</span>
        <li v-for="(collection, index) in collections" v-else class="parent">
          <a data-toggle="collapse" :href="'#collect-'+index">
            <span class="glyphicon glyphicon-tag"></span>
            @{{collection.title}}
          </a>
          <ul class="children collapse" :id="'collect-'+index">
            <li v-for="site in collection.sites">
              <a href="javascript:void(0)" @click="getTimeLine({url: site.url})">
                <span class="glyphicon glyphicon-bookmark"></span>
                @{{site.title}}
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </li>
    @endif


</div><!--/.sidebar-->
