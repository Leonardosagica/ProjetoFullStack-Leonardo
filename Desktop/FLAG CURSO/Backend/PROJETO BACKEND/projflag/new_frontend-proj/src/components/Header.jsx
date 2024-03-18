/* import Navbarmenu from "../components/Navbarmenu.jsx"; */
import { Link } from "react-router-dom";

function Header() {
    return (
        <header>
            <div id="header-container" className="flex justify-between">
                <div className="w-1/5">
                    <a href="/">
                        <img
                            src="https://w7.pngwing.com/pngs/957/974/png-transparent-hospital-logo-clinic-health-care-physician-business.png"
                            alt="logo"
                            id="logo"
                            className="h-8"
                        />
                    </a>
                </div>
                <div id="header_menu" className="w-4/5">
                    <ul className="flex justify-end align-bottom">
                        <li className="mr-4">
                            <Link to="/login">Login</Link>
                        </li>
                        <li className="mr-4">
                            <Link to="/signup">Sign Up</Link>
                        </li>
                        <li className="mr-4">
                            <Link to="/help">Help</Link>
                        </li>
                    </ul>
                </div>
            </div>
            {/* <Navbarmenu /> */}
        </header>
    );
}

export default Header;
