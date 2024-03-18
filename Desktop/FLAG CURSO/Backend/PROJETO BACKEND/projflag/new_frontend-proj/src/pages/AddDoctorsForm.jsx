import { useNavigate, useParams } from "react-router-dom";
import { useState, useEffect } from "react";
import api from "../services/api";
import { useStateContext } from "../contexts/ContextProvider";

export default function AddDoctorsForm() {
    const { id } = useParams();
    const navigate = useNavigate();
    const [loading, setLoading] = useState(false);
    const [errors, setErrors] = useState(null);

    const { setNotification } = useStateContext();

    const [doctor, setDoctor] = useState({
        name: "",
        specialty: "",
    });

    useEffect(() => {
        if (id) {
            setLoading(true);
            api.get(`/add_doctors_show/${id}`)
                .then(({ data }) => {
                    setLoading(false);
                    setDoctor(data);
                })
                .catch(() => {
                    setLoading(false);
                });
        }
    }, [id]);

    const onSubmit = (ev) => {
        ev.preventDefault();
        setLoading(true);
        if (doctor.id) {
            api.put(`/add_doctors_create/${id}`, doctor)
                .then(() => {
                    setNotification("Doctor updated successfully!");
                    setLoading(false);
                    navigate("/add_doctors");
                })
                .catch((err) => {
                    setLoading(false);
                    const response = err.response;
                    if (response && response.status === 422) {
                        setErrors(response.data.errors);
                    }
                });
        } else {
            api.post("/add_doctors_create", doctor)
                .then(() => {
                    setNotification("Doctor created successfully!");
                    setLoading(false);
                    navigate("/add_doctors");
                })
                .catch((err) => {
                    if (err.response && err.response.status === 422) {
                        console.log(err.response.data.errors);
                        setErrors(err.response.data.errors);
                    }
                });
        }
    };

    return (
        <>
            {doctor.id && <h1>Update doctor:{doctor.id} </h1>}
            {!doctor.id && <h1>New doctor</h1>}
            <div>
                {loading && <div className="text-center"> Loading... </div>}
                {errors && (
                    <div className="alert">
                        {Object.keys(errors).map((key) => (
                            <p key={key}>{errors[key][0]}</p>
                        ))}
                    </div>
                )}
                {!loading && (
                    <form onSubmit={onSubmit}>
                        <input
                            onChange={(ev) =>
                                setDoctor({ ...doctor, name: ev.target.value })
                            }
                            value={doctor.name}
                            placeholder="name"
                            type="text"
                        />
                        <input
                            onChange={(ev) =>
                                setDoctor({
                                    ...doctor,
                                    specialty: ev.target.value,
                                })
                            }
                            placeholder="Specialty"
                            type="text"
                        />
                        <button>Save</button>
                    </form>
                )}
            </div>
        </>
    );
}
