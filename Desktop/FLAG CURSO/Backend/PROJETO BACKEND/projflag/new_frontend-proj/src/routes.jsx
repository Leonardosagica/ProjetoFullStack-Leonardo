import { BrowserRouter, Route, Routes } from "react-router-dom";

import Home from "./pages/Home";
import Client from "./pages/Client";
import AddClients from "./pages/AddClients";
import AddAppointments from "./pages/AddAppointments";
import Users from "./pages/Users";
import AddDoctorsForm from "./pages/AddDoctorsForm";
import Adm from "./pages/Adm";
import Login from "./pages/Login";
import Signup from "./pages/Signup";
import Help from "./pages/Help";
/* import Schedule from "./pages/Schedule"; */
/* import Medicine from "./pages/Medicine"; */

import NotFound from "./pages/NotFound";
import Doctors from "./pages/Doctors";
import AddDoctors from "./pages/AddDoctors";
import UserForm from "./pages/UserForm";

export default function App() {
    return (
        <BrowserRouter>
            <Routes>
                {/* Common Routes */}
                <Route path="/" element={<Home />} />
                <Route path="/login" element={<Login />} />
                <Route path="/signup" element={<Signup />} />
                <Route path="/help" element={<Help />} />
                <Route path="*" element={<NotFound />} />
                <Route path="/add_appointments" element={<AddAppointments />} />
                {/* <Route path="/schedule" element={<Schedule />} /> */}

                {/* Adm Routes */}
                <Route path="/adm" element={<Adm />} />

                <Route path="/users" element={<Users />} />
                <Route
                    path="/users/new"
                    element={<UserForm key={"userCreate"} />}
                />
                <Route
                    path="/users/:id"
                    element={<UserForm key={"userUpdate"} />}
                />

                <Route path="/add_doctors" element={<AddDoctors />} />
                <Route
                    path="/add_doctors/new"
                    element={<AddDoctorsForm key={"doctorCreate"} />}
                />
                <Route
                    path="/add_doctors/:id"
                    element={<AddDoctorsForm key={"doctorUpdate"} />}
                />

                <Route path="/add_clients" element={<AddClients />} />
                <Route
                    path="/clients/new"
                    element={<UserForm key={"userCreate"} />}
                />
                <Route
                    path="/clients/:id"
                    element={<UserForm key={"userUpdate"} />}
                />

                {/* Doctors Routes */}
                <Route path="/doctors" element={<Doctors />} />
                {/* <Route path="/medicine" element={<Medicine />} /> */}

                {/* Client Routes */}
                <Route path="/client" element={<Client />} />
            </Routes>
        </BrowserRouter>
    );
}
