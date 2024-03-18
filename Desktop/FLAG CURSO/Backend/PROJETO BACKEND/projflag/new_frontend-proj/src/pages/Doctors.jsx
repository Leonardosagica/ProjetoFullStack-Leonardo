/* import axios from "axios";
import { useEffect, useState } from "react";

export const Doctors = () => {
    const [doctors, setDoctors] = useState([]);
    const getDoctors = async () => {
        try {
            const response = await axios.get(
                "http://127.0.0.1:8000/api/doctors"
            );
            console.log(response.data);
            setDoctors(response.data);
        } catch (error) {
            console.error("erro ao consultar a base de dados", error);
        }
    };
    useEffect(() => {
        getDoctors();
    }, []);

    return (
        <div>
            <ul>
                {doctors.map((doctor) => (
                    <li key={doctor.id}>
                        {doctor.name} - {doctor.specialty}
                    </li>
                ))}
            </ul>
        </div>
    );
}; */

import Footer from "../components/Footer";
import api from "../services/api.jsx";
import { useStateContext } from "../contexts/ContextProvider";
import { useNavigate, Link } from "react-router-dom";
import { useEffect } from "react";
import "../styles/index.css";

function Doctors() {
    const { user, token, notification, setUser, setToken } = useStateContext();
    const navigate = useNavigate();
    useEffect(() => {
        api.get("user").then(({ data }) => {
            setUser(data);
        });
    }, [setUser]);

    if (!token) {
        return navigate("/login");
    }

    const onLogout = (ev) => {
        ev.preventDefault();

        api.post("logout").then(() => {
            setUser({});
            setToken(null);
            return navigate("/login");
        });
    };
    return (
        <>
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
                            <li className="mr-4">{user.name}</li>
                            <li className="mr-4">
                                <a href="/login" onClick={onLogout}>
                                    Logout
                                </a>
                            </li>
                            <li className="mr-4">
                                <Link to="/help">Help</Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>

            {/* *************************************************************************************************** */}

            <div className="h-screen w-full flex bg-gray-800">
                <nav className="w-24 flex flex-col items-center bg-gray-900 py-4">
                    <div className="text-lg font-semibold text-white">
                        {user.name}
                    </div>
                    {/* <!-- nav content --> */}
                    <ul className="mt-2 text-gray-300 font-semibold">
                        <li className="mt-3 t">
                            <div className="flex flex-col items-center text-sm capitalize">
                                <Link to="/schedule">
                                <svg
                                    className="fill-current h-5 w-5"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9
                    17v2H5v-2h4M21 3h-8v6h8V3M11 3H3v10h8V3m10
                    8h-8v10h8V11m-10 4H3v6h8v-6z"
                                    ></path>
                                </svg>
                                    <span>Schedule</span>
                                </Link>
                            </div>
                        </li>

                        <li className="mt-3 t">
                            <div className="flex flex-col items-center text-sm capitalize" >
                                <Link to="/medicine">
                                <svg
                                    className="fill-current h-5 w-5"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9
                    17v2H5v-2h4M21 3h-8v6h8V3M11 3H3v10h8V3m10
                    8h-8v10h8V11m-10 4H3v6h8v-6z"
                                    ></path>
                                </svg>
                                    <span>Medicine Lists</span>
                                </Link>
                            </div>

                        </li>
                    </ul>
                </nav>
                {/* <!-- main --> */}
                <main className="w-full overflow-y-auto">
                    <div className="px-10 mt-5">
                        <span className="uppercase font-bold text-2xl text-white">
                            special food
                        </span>
                    </div>
                    <div className="px-10 grid grid-cols-4 gap-4">
                        <div className="col-span-4 sm:col-span-4 md:col-span-2 lg:col-span-1 xl:col-span-1 flex flex-col items-center">
                            <div className="bg-white rounded-lg mt-5">
                                <img
                                    src="https://source.unsplash.com/MNtag_eXMKw/1600x900"
                                    className="h-40 rounded-md"
                                    alt=""
                                />
                            </div>
                            <div className="bg-white shadow-lg rounded-lg -mt-4 w-64">
                                <div className="py-5 px-5">
                                    <span className="font-bold text-gray-800 text-lg">
                                        Geek Pizza
                                    </span>
                                    <div className="flex items-center justify-between">
                                        <div className="text-sm text-gray-600 font-light">
                                            Size : Regular
                                        </div>
                                        <div className="text-2xl text-red-600 font-bold">
                                            $ 8.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {/* <!-- end cols --> */}
                    </div>
                </main>
            </div>

            {/* *************************************************************************************************** */}

            {/* NOTIFICATIONS */}
            <div>
                {notification && (
                    <div
                        className="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                        role="alert"
                    >
                        {notification}
                    </div>
                )}
            </div>

            <Footer />
        </>
    );
}

export default Doctors;
