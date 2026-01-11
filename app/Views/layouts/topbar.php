<style>
body {
    font-family: 'Nunito', sans-serif;
    background-color: #F0FDF4;
}

#wrapper {
    display: flex;
}

/* === FIX TOPBAR === */
.topbar {
    position: relative !important;
    height: 70px;
    background: linear-gradient(135deg, #16A34A, #22C55E) !important;
}

/* === FIX CONTENT === */
#content-wrapper {
    width: 100%;
    overflow-x: hidden;
}

#content {
    padding-top: 20px;
}

/* === CARD === */
.dashboard-card {
    cursor: pointer;
    border-radius: 14px;
    transition: .3s;
}

.dashboard-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 25px rgba(0,0,0,.15);
}

/* === ICON === */
.icon-circle {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
}
</style>