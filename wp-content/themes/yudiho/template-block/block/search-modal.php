<!--Search Modal -->
<div class="modal fade" id="searchForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">

        <div class="modal-content ">
            <div class="modal-body">
                <button type="button" class="btn-close form-close-button" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                <div class="search-form">
                    <form id="yudiho-search-form">
                        <div class="input-group">
                            <input type="text" class="form-control search-form__input" id="search-box"
                                   placeholder="Search this blog" name="search_terms">
                            <div class="input-group-append">
                                <button class="btn bg-yudiho-navy yudiho-color-soft" id="search-post" type="button">
                                    <i class="lni lni-search"></i>
                                </button>
                            </div>

                        </div>
                    </form>
                    <div class="dropdown-divider"></div>
                </div>
                <div id="search_result"></div>
            </div>
        </div>
    </div>
</div>