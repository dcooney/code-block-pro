import { useEffect, useState } from '@wordpress/element';
import { Lang } from 'shiki';
import { useLanguageStore } from '../state/language';
import { AttributesPropsAndSetter } from '../types';

export const useLanguage = ({
    attributes,
    setAttributes,
}: AttributesPropsAndSetter) => {
    const [language, set] = useState<Lang>(attributes.language);
    const { previousLanguage, setPreviousLanguage } = useLanguageStore();
    const setLanguage = (language: Lang) => {
        setAttributes({ language });
        set(language);
        setPreviousLanguage(language);
    };

    useEffect(() => {
        if (language) return;
        setAttributes({ language: previousLanguage });
        set(previousLanguage);
    }, [language, previousLanguage, setAttributes]);

    return [language, setLanguage] as [Lang, typeof setLanguage];
};
