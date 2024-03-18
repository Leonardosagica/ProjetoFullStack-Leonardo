import { useState, useEffect } from "react";
import { useStateContext } from "../contexts/ContextProvider";
import api from "../services/api";
import Footer from "../components/Footer";
import "../styles/index.css";
import { Link, useNavigate } from "react-router-dom";

function Users() {
    const [users, setUsers] = useState([]);
    const [loading, setLoading] = useState(false);
    const { user, token, notification, setUser, setToken, setNotification } =
        useStateContext();
    const navigate = useNavigate();

    useEffect(() => {
        getUsers();
    }, []);

    useEffect(() => {
        api.get("user").then(({ data }) => {
            setUser(data);
        });
    }, [setUser]);

    if (!token) {
        return navigate("/login");
    }

    const onDelete = (user) => {
        if (window.confirm(`Are you sure you want to delete ${user.name}?`)) {
            api.delete(`/users/${user.id}`).then(() => {
                setNotification("User deleted sucessfully!");
                getUsers();
            });
        }
        return;
    };

    const getUsers = () => {
        setLoading(true);
        api.get("/users")
            .then(({ data }) => {
                setLoading(false);
                setUsers(data);
            })
            .catch(() => {
                setLoading(false);
            });
    };
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

            <div className="h-screen w-full flex bg-gray-800">
                <nav className="w-24 flex flex-col items-center bg-gray-900 py-4">
                    <div className="text-lg font-semibold text-white">
                        {user.name}
                    </div>
                    {/* <!-- nav content --> */}
                    <ul className="mt-2 text-gray-300 font-semibold">
                        <li className="mt-3 t">
                            <a
                                href="#"
                                className="flex flex-col items-center text-sm capitalize"
                            >
                                <svg
                                    className="h-8 w-8 text-gray-400"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    strokeWidth={2}
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                >
                                    {" "}
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />{" "}
                                    <circle cx="9" cy="7" r="4" />{" "}
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />{" "}
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                                <span>
                                    <Link to="/users">All Users</Link>
                                </span>
                            </a>
                        </li>
                        <li className="mt-3 t">
                            <a
                                href="#"
                                className="flex flex-col items-center text-sm capitalize"
                            >
                                <svg
                                    className="h-8 w-8 text-gray-400"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    strokeWidth="2"
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                >
                                    {" "}
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />{" "}
                                    <circle cx="8.5" cy="7" r="4" />{" "}
                                    <line x1="20" y1="8" x2="20" y2="14" />{" "}
                                    <line x1="23" y1="11" x2="17" y2="11" />
                                </svg>
                                <span className="ml-3">
                                    <Link to="/add_doctors">
                                        Add new Doctors
                                    </Link>
                                </span>
                            </a>
                        </li>
                        <li className="mt-3 t">
                            <a
                                href="#"
                                className="flex flex-col items-center text-sm capitalize"
                            >
                                <svg
                                    className="h-8 w-8 text-gray-400"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    strokeWidth="2"
                                    stroke="currentColor"
                                    fill="none"
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                >
                                    {" "}
                                    <path
                                        stroke="none"
                                        d="M0 0h24v24H0z"
                                    />{" "}
                                    <circle cx="9" cy="7" r="4" />{" "}
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />{" "}
                                    <path d="M16 11h6m-3 -3v6" />
                                </svg>
                                <span className="ml-3">
                                    <Link to="/add_patients">
                                        Add new Patients
                                    </Link>
                                </span>
                            </a>
                        </li>
                        <li className="mt-3 t">
                            <a
                                href="#"
                                className="flex flex-col items-center text-sm capitalize"
                            >
                                <svg
                                    className="h-8 w-8 text-gray-400"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    strokeWidth="2"
                                    stroke="currentColor"
                                    fill="none"
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                >
                                    {" "}
                                    <path
                                        stroke="none"
                                        d="M0 0h24v24H0z"
                                    />{" "}
                                    <path d="M9 5H7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2V7a2 2 0 0 0 -2 -2h-2" />{" "}
                                    <rect
                                        x="9"
                                        y="3"
                                        width="6"
                                        height="4"
                                        rx="2"
                                    />{" "}
                                    <line x1="9" y1="12" x2="9.01" y2="12" />{" "}
                                    <line x1="13" y1="12" x2="15" y2="12" />{" "}
                                    <line x1="9" y1="16" x2="9.01" y2="16" />{" "}
                                    <line x1="13" y1="16" x2="15" y2="16" />
                                </svg>
                                <span>Add Appointment</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                {/* <!-- main --> */}
                <main className="w-full overflow-y-auto">
                    <div className="px-10 mt-5">
                        <span className="uppercase font-bold text-2xl text-white">
                            All Users
                        </span>
                        <Link
                            to="/users/new"
                            className="
                            bg-blue-500
                            hover:bg-blue-700
                            text-white
                            font-bold
                            py-2
                            px-4
                            rounded-full"
                        >
                            Add new
                        </Link>
                    </div>
                    <div className="px-10 grid grid-cols-4 gap-4">
                        <table>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Create Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            {loading && (
                                <tbody>
                                    <td colSpan={5} className="text-center">
                                        Loading...
                                    </td>
                                </tbody>
                            )}

                            {!loading && (
                                <tbody>
                                    {users.map((user) => (
                                        <tr key={user.id}>
                                            <td>{user.id}</td>
                                            <td>{user.name}</td>
                                            <td>{user.email}</td>
                                            <td>{user.created_at}</td>
                                            <td>
                                                <Link
                                                    to={"/users/" + user.id}
                                                    className="text-blue-500"
                                                >
                                                    Edit
                                                </Link>

                                                <button
                                                    onClick={() =>
                                                        onDelete(user)
                                                    }
                                                >
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            )}
                        </table>
                        {/* <!-- end cols --> */}
                    </div>
                </main>
            </div>
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
export default Users;
