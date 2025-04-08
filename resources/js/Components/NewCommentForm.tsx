import { Feature } from "@/types";
import PrimaryButton from "./PrimaryButton";
import { useForm } from "@inertiajs/react";
import InputError from "./InputError";
import TextAreaInput from "./TextAreaInput";

export default function NewCommentForm({ feature }: { feature: Feature }) {
    const { data, setData, post, processing, errors } = useForm({
        comment: "",
    });

    function handleSubmit(e: React.SyntheticEvent<EventTarget>) {
        e.preventDefault();

        post(route("featureComment.store", feature), {
            preserveScroll: true,
            preserveState: true,
            onSuccess: () => setData("comment", ""),
        });
    }

    return (
        <form
            onSubmit={handleSubmit}
            className="flex justify-start gap-2 justify-center flex-col"
        >
            <div className="flex w-full gap-2">
                <TextAreaInput
                    rows={2}
                    required
                    className="flex-1"
                    value={data.comment}
                    onChange={(e) => setData("comment", e.target.value)}
                    name="comment"
                    placeholder="Add comment..."
                />
                <PrimaryButton
                    className="w-2/12 h-20 self-end justify-center"
                    disabled={processing}
                >
                    Comment
                </PrimaryButton>
            </div>
            {errors["comment"] && (
                <div>
                    <InputError message={errors["comment"]} />
                </div>
            )}
        </form>
    );
}
