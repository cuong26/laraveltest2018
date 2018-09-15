<style>
    /* select 2 css */
    .select2-container--bootstrap .select2-selection {
        border-radius: 0 !important;
        line-height: 26px;
    }

    /* datepicker */
    .datepicker {
        z-index: 999999 !important;
    }

    /* required label */
    label.required:after {
        color: #dd4b39;
        content: "*";
        font-weight: bold;
        margin-left: 5px;
    }

    /* loading */
    #loading {
        position: fixed;
        top: 0;
        left: 0;
        height:100%;
        width:100%;
        z-index: 9999999;
        background-image: url('assets/images/loading.gif');
        background-position: center;
        background-repeat: no-repeat;
        display: none;
    }

    /* border timepicker */
    .bootstrap-timepicker-widget table td input {
        border: 1px solid grey !important;
    }

    /* title */
    .page-title {
        text-transform: capitalize;
    }
</style>